<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meja;

class MejaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('meja.create');
    }

    public function submit(Request $request){
            try {
                    $data = meja::create([
                        'meja' =>$request->name,
                    ]);
                return redirect('meja')
                ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
            } catch(Exception $e) {
                return redirect('meja')->with(['error' => $e->getMessage()]);
            }
    }

    public function view()
    {
        $data=meja::orderby('meja','asc')->get();
        return view('meja.view',['data'=>$data]);
    }

    public function edit($id)
    {
        $meja = meja::find($id);
        return view('meja.edit',['meja'=>$meja]);
    }

    public function update(Request $request)
    {
            $content=meja::find($request->id);
            $content->update([
                'meja' =>$request->name,
                ]);

       return redirect('meja/')
       ->with(['success' => 'Menu <strong>' . $request->name . '</strong> Telah Berhasil Ditambahkan']);
    }

    public function delete($id)
    {
        $menu=meja::find($id);
        $menu->delete();
        return redirect('meja')
                ->with(['success' => 'Menu <strong>' . $menu->menu . '</strong> Telah Berhasil Dihapus']);
    }

    public function search(Request $request)
    {
        $data=meja::where('meja','LIKE','%'.$request->search.'%')
        ->paginate(12);
        return view('meja.view',['data'=>$data]);
    }
}
