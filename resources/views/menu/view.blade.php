@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-10">
    <h1>Menu</h1>
    </div>
    <div class="col-md-2">
    <a href="{{route('menu.create')}}" class="btn btn-success">Tambah Menu</a>
    </div>
    </div>
    <hr>


                <form action="{{route('menu.search')}}">
                        <div class="row">
                        <div class="col-md-6">
                        <input class="form-control" type="text" name="search" placeholder="Pencarian...">
                        </div>
                        <div class="col-md-6">
                        <button class="btn btn-success">
                            Cari
                        </button>
                    </div>
                </div>
                    </form>
                    <br>



            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>gambar</th>
                    <th>Menu</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($menu as $item)
                    <tr>

                    <td><img src="{{asset('image/produk/'.$item->gambar)}}" style="object-fit:cover;width:100px;height:100px"></td>
                    <td>{{$item->menu}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>Rp.{{number_format($item->harga)}},00</td>
                    <td>
                    <form action="{{url('menu/delete/'.$item->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Menu {{$item->menu}} ?')">Hapus</button>
                        <a href="{{url('menu/edit/'.$item->id)}}" class="btn btn-warning">Edit</a>
                        </form>
                    </td>
                    @empty
                    <td colspan="7"><center>Belum Ada Menu</center></td>
                    @endforelse
                    </tr>
                </tbody>
                </table>
</div>
@endsection
