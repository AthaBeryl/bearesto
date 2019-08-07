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
                <h3>Our Menu</h3>
                <br>
                <br>
                <div class="card-columns">
                @forelse ($menu as $item)
                <input type="hidden" name="menu[]" value="{{$item->menu}}">
                <input type="hidden" name="harga[]" value="{{$item->harga}}">
                <div class="card" style="width: 18rem;">
                <img src="{{asset('image/produk/'.$item->gambar)}}" class="card-img-top" alt="..." style="object-fit:cover;height:250px">
                <div class="card-body">
                  <h5 class="card-title">{{$item->menu}}</h5>
                   <p class="card-text">{{$item->deskripsi}}</p>
                            </div>
                 <ul class="list-group list-group-flush">
                   <li class="list-group-item">Rp.{{number_format($item->harga)}},00</li>
                   <li class="list-group-item">
                   <input type="text" class="form-control" placeholder="Jumlah" name="jumlah[{{$item->id}}]" >
                   </li>
                   <li class="list-group-item">
                   <input type="text" class="form-control" placeholder="Keterangan (Misal Tidak Pedas)" name="keterangan[{{$item->id}}]">
                   </li>
                 </ul>
            </div>
            @empty
            <h1><center>Belum Ada Menu</center></h1>
            @endforelse
            </div>
            <hr>
            <h4><center>Meja</center></h4>
            <select class="form-control" name="meja" required autofocus>
                    @foreach($meja as $m)
                    <option value="{{$m->meja}}">{{$m->meja}}</option>
                    @endforeach
               </select>
            <br>
            <button class="btn btn-success">Order</button>
            </form>





</div>
            </div>
        </div>
        </div>
    </body>
</html>
