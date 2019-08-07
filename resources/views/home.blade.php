@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @role('kasir')
            <div class="card">
                <div class="card-header">Kasir</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>KASIR</h1>
                   Selamat Datang Di Bearesto ! {{Auth::user()->name}}
                </div>
            </div>
            @endrole

            @role('owner')
            <div class="card">
                <div class="card-header">Owner</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>OWNER</h1>
                   Selamat Datang Di Bearesto ! {{Auth::user()->name}}
                </div>
            </div>
            @endrole

            @role('dapur')
            <div class="card">
                <div class="card-header">Kasir</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>DAPUR</h1>
                   Selamat Datang Di Bearesto ! {{Auth::user()->name}}
                </div>
            </div>
            @endrole
        </div>
    </div>
</div>
@endsection
