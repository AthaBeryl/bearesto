<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\transaksi;
use Carbon\Carbon;
use App\Exports\SalaryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function salary(){
        $year=Carbon::now()->year;
        $month=Carbon::now()->format('F');
        $transaksi= db::table('transaksi')->select(DB::raw("sum(`harga`) as tharga,sum(`jumlah`) as tjumlah,sum(`subtotal`) as tsubtotal,`menu` "))->groupBy('menu')
        ->orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y-m').'%',)->get();
        return view('report.salary',['transaksi'=>$transaksi,'year'=>$year,'month'=>$month]);
    }

    public function ysalary(){
        $year=Carbon::now()->year;
        $month= 'January - December';
        $transaksi= db::table('transaksi')->select(DB::raw("sum(`harga`) as tharga,sum(`jumlah`) as tjumlah,sum(`subtotal`) as tsubtotal,`menu` "))->groupBy('menu')
        ->orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y').'%',)->get();
        return view('report.salary',['transaksi'=>$transaksi,'year'=>$year,'month'=>$month]);
    }

    public function salary_pdf(){
        $year=Carbon::now()->year;
        $month=Carbon::now()->format('F');
        // $transaksi=transaksi::orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y-m').'%',)->get();
        $transaksi= db::table('transaksi')->select(DB::raw("sum(`harga`) as tharga,sum(`jumlah`) as tjumlah,sum(`subtotal`) as tsubtotal,`menu` "))->groupBy('menu')
        ->orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y-m').'%',)->get();
        $report=PDF::loadview('report.pdxcl.salary',['transaksi'=>$transaksi,'year'=>$year,'month'=>$month]);
        return $report->download('Laporan Pendapatan '.$year.' - '.$month);
    }

    public function ysalary_pdf(){
        $year=Carbon::now()->year;
        $month='January - December';
        // $transaksi=transaksi::orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y-m').'%',)->get();
        $transaksi= db::table('transaksi')->select(DB::raw("sum(`harga`) as tharga,sum(`jumlah`) as tjumlah,sum(`subtotal`) as tsubtotal,`menu` "))->groupBy('menu')
        ->orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y').'%',)->get();
        $report=PDF::loadview('report.pdxcl.salary',['transaksi'=>$transaksi,'year'=>$year,'month'=>$month]);
        return $report->download('Laporan Pendapatan '.$year.' - '.$month);
    }

    public function salary_excel()
    {
        $year=Carbon::now()->year;
        $month=Carbon::now()->format('F');
        return Excel::download(new SalaryExport, 'Laporan Pendapatan '.$year.' - '.$month.'.xlsx');
    }
}
