@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pemohon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard Peramalan Tingkat Kinerja Sales Honda Kartika Sari Putra Dinoyo</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <!-- <strong class="card-title">Pemohon</strong> -->
                            </div>
                            <div class="pull-right">
                                <a href=" {{ url('/data_pemohon') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_pemohon/update/' . $pemohon->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="">
                                           
                                            <div class="form-group">
                                                <label for="nama_pemohon">Nama Mitra</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_pemohon"
                                                        class="form-control @error('nama_pemohon') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('nama_pemohon', $pemohon->nama_pemohon) }}" />
                                                </div>
                                                <text>ex : Dea</text>
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Usia</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="usia"
                                                        class="form-control @error('usia') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('usia', $pemohon->usia) }}" />
                                                </div>
                                                <text>ex : 20</text>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('alamat', $pemohon->alamat) }}" />
                                                </div>
                                                <text>ex : pasuruan</text><br><br>
                                            </div>  

                                            <button type="submit" class="btn btn-success" name="edit"><i
                                                    class="fa fa-edit"></i> Edit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection