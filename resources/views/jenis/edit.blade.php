@extends('layouts.app')
@section('content')

<div class="container">
        <div class="card">
            <div class="card-header">{{ __('Edit jenis') }}</div>
                <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{route('jenis.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" class="form-control">
        <input type="hidden" name="id" value="{{$jenis->id}}">
        <div class="m-portlet__body">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="m-form__section">
                                  <div class="form-group m-form__group row ">
                                          <label class="form-control-label col-lg-3">Nama</label>
                                          <div class="col-lg-9">
                                          <input type="text" class="form-control" placeholder="Nama jenis" name="name" value="{{$jenis->jenis}}" required autofocus>
                                          </div>
                                  </div>

            </form>
        </div>
        </div>
</div>
@endsection
