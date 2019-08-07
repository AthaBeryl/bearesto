@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-10">
    <h1>Pegawai</h1>
    </div>
    <div class="col-md-2">
    <a href="{{route('pegawai.create')}}" class="btn btn-success">Tambah Pegawai</a>
    </div>
    </div>
    <hr>


                <form action="{{route('pegawai.search')}}">
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
                    <th>nama</th>
                    <th>email</th>
                    <th>jabatan</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($user as $me)
                    <tr>


                    <td>{{$me->name}}</td>
                    <td>{{$me->email}}</td>
                    <td>{{$jabatan->where('model_id','=',$me->id)->first()->name}}</td>
                    <td>
                    <form action="{{url('pegawai/delete/'.$me->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User {{$me->name}} ?')">Delete</button>
                        <a href="{{url('pegawai/edit/'.$me->id)}}" class="btn btn-warning">Edit</a>
                        </form>
                    </td>
                    @empty
                    <td colspan="4"><center>Belum Ada Pegawai</center></td>
                    @endforelse
                    </tr>
                </tbody>
                </table>
</div>
@endsection
