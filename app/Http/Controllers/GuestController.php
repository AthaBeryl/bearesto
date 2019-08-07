<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\menu;
use App\meja;
use App\pemesanan;
use App\delay;
class GuestController extends Controller
{
    public function welcome()
    {
        $meja=meja::orderby('meja','asc')->get();
        $menu=menu::orderby('menu','asc')->get();
        return view('welcome',['menu'=>$menu,'meja'=>$meja]);
    }

    public function order(Request $request)
    {

        dd(request()->all());

        //   return $pesanan;

          try {
            $meja = delay::create([
                'meja' =>$request->meja,
            ]);

    } catch(Exception $e) {
        return redirect('/')->with(['error' => $e->getMessage()]);
    }
          foreach($pesanan as $p){
            try {
                $pesanan = pemesanan::create([
                    'menu' =>$pesanan['menu'][$i],
                    'harga' => $pesanan['harga'][$i],
                    'jumlah' =>  $pesanan['jumlah'][$i],
                    'keterangan' => $pesanan['keterangan'][$i],
                    'id_delay'=>$meja->id
                ]);

        } catch(Exception $e) {
            return redirect('/upload')->with(['error' => $e->getMessage()]);
        }
         }
        return redirect('/')
        ->with(['success' => 'Pesanan Telah Berhasil Ditambahkan']);

    }

    public function myorder(Request $request){
        $meja=meja::orderby('meja','asc')->get();
        return view('myorder',['meja'=>$meja]);
    }

    public function myorder_detail(Request $request){
        $menu=menu::get();
        $table=db::table('delay')->where('meja',$request->meja)->orderby('meja','asc')->pluck('id');
        $order=pemesanan::wherein('id_delay',$table)->orderby('created_at')->get();
        
        return view('myorder_detail',['order'=>$order,'menu'=>$menu]);
    }
}
