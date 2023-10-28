@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <strong class="card-title">Inventory</strong>
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
                                        <form action="{{ url('/data_pemohon/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="kode"
                                                        class="form-control @error('kode_bahan') is-invalid @enderror"
                                                        value="{{ old('kode') }}" autofocus
                                                        placeholder="Kode">
                                                    @error('kode')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : KB00001</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_mitra">Nama Mitra</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_mitra"
                                                        class="form-control @error('nama_mitra') is-invalid @enderror"
                                                        value="{{ old('nama_mitra') }}" autofocus
                                                        placeholder="Nama Mitra">
                                                    @error('nama_mitra')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : Dea</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Usia</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="usia"
                                                        class="form-control @error('usia') is-invalid @enderror"
                                                        value="{{ old('usia') }}" autofocus
                                                        placeholder="Usia">
                                                    @error('usia')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 21</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        value="{{ old('alamat') }}" autofocus placeholder="Alamat">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 20</text><br><br>
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
