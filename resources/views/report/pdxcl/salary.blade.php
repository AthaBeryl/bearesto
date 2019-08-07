<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pemasukan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
    <h4>Laporan Penjualan Bearesto</h4>
        <h5>Tahun {{$year}}</h5>
                <h5>Bulan {{$month}}</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
				<th>menu</th>
				<th>harga</th>
				<th>terjual</th>
				<th>subtotal</th>
				{{-- <th>tanggal</th> --}}
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaksi as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->menu}}</td>
				<td>Rp.{{number_format($p->tharga)}},00</td>
				<td>{{$p->tjumlah}}</td>
				<td>Rp.{{number_format($p->tsubtotal)}},00</td>
				{{-- <td>{{$p->created_at->format('Y-M-d')}}</td> --}}
			</tr>
			@endforeach
		</tbody>
    </table>
<h5 style="float: right">Total Pendapatan : Rp.{{number_format($transaksi->sum('tsubtotal'))}},00</h5>

</body>
</html>
