@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bobot Kriteria</h1>
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
                                <a href=" {{ url('/kriteria') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/kriteria/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="id_kriteria">Id Kriteria</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="id_kriteria"
                                                        class="form-control @error('id_kriteria') is-invalid @enderror"
                                                        value="{{ old('id_kriteria') }}" autofocus
                                                        placeholder="id_kriteria">
                                                    @error('id_kriteria')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 1</text>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_kriteria">Nama Kriteria</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_kriteria"
                                                        class="form-control @error('nama_kriteria') is-invalid @enderror"
                                                        value="{{ old('nama_kriteria') }}" autofocus
                                                        placeholder="">
                                                    @error('nama_kriteria')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : Pendapatan</text>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot">Bobot</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="bobot"
                                                        class="form-control @error('bobot') is-invalid @enderror"
                                                        value="{{ old('bobot') }}" autofocus
                                                        placeholder="">
                                                    @error('bobot')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex :1</text>
                                            </div>
                                                <div class="form-group">
                                                    <label for="sifat">Keterangan</label>
                                                    <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" 
                                                    aria-hidden="true"></i></span>
                                                        <select class="form-select" name="sifat">
                                                            <!-- <option selected> Pilih Keterangan</option> -->
                                                            <option value="Cost">Cost</option>
                                                            <option value= "Benefit">Benefit</option>
                                                </select>
                                                    </div>
                                                    <text>ex : Cost</text><br><br>
                                                </div>
                                            <button type="submit" class="btn btn-success" name="simpan"><i
                                                    class="fa fa-save"></i> Save
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
</div>
@endsection
