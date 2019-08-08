<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $roles = Role::orderby('name','asc')->where('id','!=','1')->get();
        return view('pegawai.create',['roles'=>$roles]);
    }

    public function submit(Request $request){
            try {
                    $pegawai = User::create([
                        'name' =>$request->name,
                        'email' => $request->email,
                        'password' => encrypt($request->password)
                    ]);
                    $pegawai->assignRole($request->role);
                return redirect('pegawai')
                ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
            } catch(Exception $e) {
                return redirect('menu')->with(['error' => $e->getMessage()]);
            }
    }

    public function view()
    {
        $user=User::orderby('name','asc')->get();
        $jabatan=db::table('roles')->join('model_has_roles','id','role_id')->select('roles.name as name','role_id','model_id')->get();
        return view('pegawai.view',['user'=>$user,'jabatan'=>$jabatan]);
    }

    public function edit($id)
    {
        $pegawai = User::find($id);
        $roles = Role::all();
        $model = DB::table('model_has_roles')->where('model_id',$id)->first();
        return view('pegawai.edit',['pegawai'=>$pegawai,'roles'=>$roles,'model'=>$model]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'mimes:jpg,jpeg,png',
            ]);
        $content=User::find($request->id);
        if($request->password != null){

        $content->update([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => encrypt($request->password)
        ]);

        }
        else{

            $content->update([
                'name' =>$request->name,
                'email' => $request->email,
                ]);
        }
        $content->removeRole($content->roles()->detach());
        $content->assignRole($request->role);


       return redirect('pegawai/')
       ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
    }

    public function delete($id)
    {
        $menu=User::find($id);
        $menu->delete();
        $menu->removeRole($menu->roles()->detach());
        return redirect('pegawai')
                ->with(['success' => 'Menu <strong>' . $menu->menu . '</strong> Telah Berhasil Dihapus']);
    }

    public function search(Request $request)
    {
        $user=User::where('name','LIKE','%'.$request->search.'%')
        ->orwhere('email','LIKE','%'.$request->search.'%')
        ->orderby('name','asc')
        ->paginate(12);
        $jabatan=db::table('roles')->join('model_has_roles','id','role_id')->select('roles.name as name','role_id','model_id')->get();
        return view('pegawai.view',['user'=>$user,'jabatan'=>$jabatan]);
    }
}
