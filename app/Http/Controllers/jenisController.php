<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;

class jenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function submit(Request $request){
            try {
                    $data = jenis::create([
                        'jenis' =>$request->name,
                    ]);
                return redirect('jenis')
                ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
            } catch(Exception $e) {
                return redirect('jenis')->with(['error' => $e->getMessage()]);
            }
    }

    public function view()
    {
        $data=jenis::orderby('jenis','asc')->get();
        return view('jenis.view',['data'=>$data]);
    }

    public function edit($id)
    {
        $jenis = jenis::find($id);
        return view('jenis.edit',['jenis'=>$jenis]);
    }

    public function update(Request $request)
    {
            $content=jenis::find($request->id);
            $content->update([
                'jenis' =>$request->name,
                ]);

       return redirect('jenis/')
       ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
    }

    public function delete($id)
    {
        $menu=jenis::find($id);
        $menu->delete();
        return redirect('jenis')
                ->with(['success' => 'Menu <strong>' . $menu->menu . '</strong> Telah Berhasil Dihapus']);
    }

    public function search(Request $request)
    {
        $data=jenis::where('jenis','LIKE','%'.$request->search.'%')
        ->paginate(12);
        return view('jenis.view',['data'=>$data]);
    }
}
