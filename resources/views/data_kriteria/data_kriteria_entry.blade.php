@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kriteria</h1>
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
                            <div class="pull-right">
                                <a href=" {{ url('/data_kriteria') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_kriteria/store') }}" method="post">
                                            @csrf
                                             <div class="form-group">
                                                <label for="id_pemohon">Nama Mitra</label>
                                                <div class="input-group margin-bottom-sm">
                                                <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                aria-hidden="true"></i></span>
                                                <select class="form-control" name="id_pemohon">
                                                    @foreach ($pemohon as $mitra)
                                                        <option class="form-control @error('id_pemohon') is-invalid @enderror" value="{{ old('id_pemohon') . $mitra->id }}">{{ $mitra->nama_pemohon }}
                                                            @error('id_pemohon')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pendapatan">Pendapatan</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="pendapatan"
                                                        class="form-control @error('pendapatan') is-invalid @enderror"
                                                        value="{{ old('pendapatan') }}" autofocus placeholder="">
                                                    @error('pendapatan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 2000000</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="plafond">Jumlah Pinjaman</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="plafond"
                                                        class="form-control @error('plafond') is-invalid @enderror"
                                                        value="{{ old('plafond') }}" autofocus placeholder="">
                                                    @error('plafond')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 2000000</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="jw">Jangka Waktu</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="jw"
                                                        class="form-control @error('jw') is-invalid @enderror"
                                                        value="{{ old('jw') }}" autofocus placeholder="">
                                                    @error('jw')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 30</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="angsuran">Angsuran</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="angsuran"
                                                        class="form-control @error('angsuran') is-invalid @enderror"
                                                        value="{{ old('angsuran') }}" autofocus placeholder="">
                                                    @error('angsuran')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 20000</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="jaminan">Nilai Jaminan</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="jaminan"
                                                        class="form-control @error('jaminan') is-invalid @enderror"
                                                        value="{{ old('jaminan') }}" autofocus placeholder="">
                                                    @error('jaminan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 18000000</text><br>
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
