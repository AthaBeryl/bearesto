<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;
use App\menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $jenis = jenis::orderby('jenis','asc')->get();
        return view('menu.create',['jenis'=>$jenis]);
    }

    public function submit(Request $request){
        $this->validate($request,[
            'gambar' => 'mimes:jpg,jpeg,png',
            ]);
            $file=$request->File('gambar');
            $imageName = time().'.'.$file->getClientOriginalName();
            try {
                    $content = menu::create([
                        'menu' =>$request->menu,
                        'harga' => $request->harga,
                        'deskripsi' => $request->desc,
                        'jenis' => $request->jenis,
                        'gambar'=>$imageName
                    ]);
                    $file->move(public_path('image/produk'), $imageName);
                return redirect('menu')
                ->with(['success' => 'Menu <strong>' . $request->barang . '</strong> Telah Berhasil Ditambahkan']);
            } catch(Exception $e) {
                return redirect('menu')->with(['error' => $e->getMessage()]);
            }
    }

    public function view()
    {
        $menu=menu::orderby('jenis','asc')->orderby('menu','asc')->get();
        return view('menu.view',['menu'=>$menu]);
    }

    public function edit($id)
    {
        $menu = menu::find($id);
        $jenis = jenis::orderby('jenis','asc')->get();
        return view('menu.edit',['jenis'=>$jenis,'menu'=>$menu]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'mimes:jpg,jpeg,png',
            ]);

        if($request->gambar != null){
            $file=$request->File('gambar');
            $imageName = time().'.'.$file->getClientOriginalName();
        $content=menu::find($request->id);
        $content->update([
            'menu' =>$request->menu,
            'harga' => $request->harga,
            'deskripsi' => $request->desc,
            'jenis' => $request->jenis,
            'gambar'=>$imageName
        ]);
        $file->move(public_path('image/produk'), $imageName);
        }
        else{
            $content=menu::find($request->id);
            $content->update([
                'menu' =>$request->menu,
                'harga' => $request->harga,
                'deskripsi' => $request->desc,
                'jenis' => $request->jenis
                ]);
        }

       return redirect('menu/')
       ->with(['success' => 'Menu <strong>' . $request->barang . '</strong> Telah Berhasil Ditambahkan']);
    }

    public function delete($id)
    {
        $menu=menu::find($id);
        $menu->delete();
        return redirect('menu')
                ->with(['success' => 'Menu <strong>' . $menu->menu . '</strong> Telah Berhasil Dihapus']);
    }

    public function search(Request $request)
    {
        $menu=menu::where('menu','LIKE','%'.$request->search.'%')
        ->orwhere('deskripsi','LIKE','%'.$request->search.'%')
        ->orderby('menu','asc')
        ->paginate(12);

        return view('menu.view',['menu'=>$menu]);
    }
}
