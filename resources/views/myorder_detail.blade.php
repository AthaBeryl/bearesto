<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bearesto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top:200px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ url('/myorder') }}">Pesanan Saya</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif
            <form action="{{route('order')}}" method="post">
            @csrf
            <input type="hidden"  name="method" value="post">
            <div class="container">
            <div class="content">
                <div class="title m-b-md">
                   Bearesto
                </div>
                <hr>
                <h3>Daftar Order Yang Kamu Pesan</h3>
                <br>
                <br>

                <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                            <th>menu</th>
                            <th>Harga</th>
                            <th>subtotal</th>
                            <th>keterangan</th>
                            <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($order as $me)
                            <tr>


                            <td>{{$menu->where('id',$me->id_menu)->first()->menu}}</td>
                            <td>{{number_format($menu->where('id',$me->id_menu)->first()->harga)}} x {{$me->jumlah}}</td>
                            <td>{{number_format($me->subtotal)}}</td>
                            <td>{{$me->keterangan}}</td>
                            <td>{{$me->status}}</td>
                            @empty
                            <td colspan="4"><center>Belum Ada Pesanan Untuk Meja Ini</center></td>
                            @endforelse
                            </tr>
                        </tbody>
                        </table>






</div>
            </div>
        </div>
        </div>
    </body>
</html>
