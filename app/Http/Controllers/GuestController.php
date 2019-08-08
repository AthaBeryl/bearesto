<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\menu;
use App\meja;
use App\pemesanan;
use App\delay;
use Illuminate\Support\Carbon;
class GuestController extends Controller
{
    public function welcome()
    {
        $meja=meja::orderby('meja','asc')->get();
        $menu=menu::orderby('jenis','asc')->orderby('menu','asc')->get();
        return view('welcome',['menu'=>$menu,'meja'=>$meja]);
    }

    public function order(Request $request)
    {

        // dd(request()->all());

        //   return $pesanan;

          try {
            $meja = delay::create([
                'meja' =>$request->meja,
            ]);

    } catch(Exception $e) {
        return redirect('/')->with(['error' => $e->getMessage()]);
    }
          foreach($request->selected as $pesanan){
              $subtotal = request()->$pesanan[1] * request()->$pesanan[2];
              if(request()->$pesanan[2] != null){
            try {
                $pesanan = pemesanan::create([
                    'id_menu' =>request()->$pesanan[0],
                    'jumlah' =>request()->$pesanan[2],
                    'keterangan' =>request()->$pesanan[3],
                    'id_delay'=>$meja->id,
                    'subtotal'=>$subtotal
                ]);

        } catch(Exception $e) {
            return redirect('/upload')->with(['error' => $e->getMessage()]);
        }
    }
         }
        return redirect('/myorder/detail?meja='.$request->meja)
        ->with(['success' => 'Pesanan Telah Berhasil Ditambahkan, Kode Pesanan Anda '.$meja->id]);

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
