<?php

namespace App\Exports;

use Carbon\Carbon;
use App\transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalaryExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $year=Carbon::now()->year;
        $month=Carbon::now()->format('F');
        $transaksi= db::table('transaksi')->select(DB::raw("sum(`harga`) as tharga,sum(`jumlah`) as tjumlah,sum(`subtotal`) as tsubtotal,`menu` "))->groupBy('menu')
        ->orderby('menu')->orderby('created_at')->where('created_at','LIKE','%'.carbon::now()->format('Y-m').'%',)->get();
        return view('report.pdxcl.salary',['year'=>$year,'month'=>$month,'transaksi'=>$transaksi]);
    }
}
