@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-10">
    <h1>jenis</h1>
    </div>
    <div class="col-md-2">
    <a href="{{route('jenis.create')}}" class="btn btn-success">Tambah jenis</a>
    </div>
    </div>
    <hr>


                <form action="{{route('jenis.search')}}">
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
                    <th>jenis</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($data as $me)
                    <tr>


                    <td>{{$me->jenis}}</td>
                    <td>
                    <form action="{{url('jenis/delete/'.$me->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus jenis {{$me->jenis}} ?')">Hapus</button>
                        <a href="{{url('jenis/edit/'.$me->id)}}" class="btn btn-warning">Edit</a>
                        </form>
                    </td>
                    @empty
                    <td colspan="4"><center>Belum Ada jenis</center></td>
                    @endforelse
                    </tr>
                </tbody>
                </table>
</div>
@endsection
