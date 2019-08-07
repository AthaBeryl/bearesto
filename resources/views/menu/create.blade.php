@extends('layouts.app')
@section('content')

<div class="container">
        <div class="card">
            <div class="card-header">{{ __('Tambah Menu') }}</div>
                <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{route ('menu.submit')}}">
            @csrf
            <input type="hidden" name="method" value="form_control">
            <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="m-form__section">
                                      <div class="form-group m-form__group row ">
                                              <label class="form-control-label col-lg-3">Nama Menu</label>
                                              <div class="col-lg-9">
                                                  <input type="text" class="form-control" placeholder="Nama Menu" name="menu" required autofocus>
                                              </div>
                                      </div>
                                      <div class="form-group m-form__group row ">
                                            <label class="form-control-label col-lg-3">Harga Menu</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" placeholder="Harga Menu" name="harga" required autofocus>
                                            </div>
                                    </div>
                                      <div class="form-group m-form__group row ">
                                        <label class="form-control-label col-lg-3">Deskripsi Menu</label>
                                      <div class="col-lg-9">
                                      <textarea class="form-control" id="m_autosize_2" name="desc" required autofocus></textarea>
                                      </div>
                                    </div>
                                      <div class="form-group m-form__group row">
                                            <label class="form-control-label col-lg-3">Jenis</label>
                                                <div class="col-lg-9">
                                                <div class="m-form__control">
                                                <select class="form-control" name="jenis" required autofocus>
                                                      @foreach($jenis as $jenis)
                                                      <option value="{{$jenis->jenis}}">{{$jenis->jenis}}</option>
                                                      @endforeach
                                                 </select>
                                                 </div>
                                                 </div>
                                      </div>

                                      <div class="form-group m-form__group row">
                                           <label class="form-control-label col-lg-3">Gambar</label>
                                           <input type="file" class="upload" name="gambar" required autofocus>
                                      </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12"></div>
                                    <div class="col-lg-9">
                                        <div class="input-group file-input">
                                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
        </div>
</div>
@endsection
