@extends('layouts.app')
@section('content')

<div class="container">
        <div class="card">
            <div class="card-header">{{ __('Tambah Pegawai') }}</div>
                <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{route ('pegawai.submit')}}">
            @csrf
            <input type="hidden" name="method" value="form_control">
            <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="m-form__section">
                                      <div class="form-group m-form__group row ">
                                              <label class="form-control-label col-lg-3">Nama</label>
                                              <div class="col-lg-9">
                                                  <input type="text" class="form-control" placeholder="Nama" name="name" required autofocus>
                                              </div>
                                      </div>
                                      <div class="form-group m-form__group row ">
                                            <label class="form-control-label col-lg-3">Email</label>
                                            <div class="col-lg-9">
                                                <input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
                                            </div>
                                    </div>
                                      <div class="form-group m-form__group row ">
                                        <label class="form-control-label col-lg-3">password</label>
                                        <div class="col-lg-9">
                                                <input type="password" class="form-control" placeholder="Password" name="pass" required autofocus>
                                            </div>
                                    </div>
                                      <div class="form-group m-form__group row">
                                            <label class="form-control-label col-lg-3">Jabatan</label>
                                                <div class="col-lg-9">
                                                <div class="m-form__control">
                                                <select class="form-control" name="jenis" required autofocus>
                                                      @foreach($roles as $role)
                                                      <option value="{{$role->id}}">{{$role->name}}</option>
                                                      @endforeach
                                                 </select>
                                                 </div>
                                                 </div>
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
