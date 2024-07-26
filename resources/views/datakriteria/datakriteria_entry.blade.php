@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Kriteria</h1>
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
                                <a href=" {{ url('/datakriteria') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/datakriteria/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_kriteria">Nama Kriteria</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_kriteria"
                                                        class="form-control @error('nama_kriteria') is-invalid @enderror"
                                                        value="{{ old('nama_kriteria') }}" autofocus
                                                        placeholder="">
                                                    @error('nama_kriteria')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : Pendapatan</text><br><br>
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
                                                <text>ex :1</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="poin1">Poin 1</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="poin1"
                                                        class="form-control @error('poin1') is-invalid @enderror"
                                                        value="{{ old('poin1') }}" autofocus
                                                        placeholder="">
                                                    @error('poin1')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 20</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="poin2">Poin 2</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="poin2"
                                                        class="form-control @error('poin2') is-invalid @enderror"
                                                        value="{{ old('poin2') }}" autofocus placeholder="">
                                                    @error('poin2')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 1</text><br><br>
                                                <div class="form-group">
                                                <label for="poin3">Poin 3</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="poin3"
                                                        class="form-control @error('poin3') is-invalid @enderror"
                                                        value="{{ old('poin3') }}" autofocus placeholder="">
                                                    @error('poin3')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 1</text><br><br>
                                                <div class="form-group">
                                                <label for="poin4">Poin 4</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="poin4"
                                                        class="form-control @error('poin4') is-invalid @enderror"
                                                        value="{{ old('poin4') }}" autofocus placeholder="">
                                                    @error('poin4')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 1</text><br><br>
                                                <div class="form-group">
                                                <label for="poin5">Poin 5</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="poin5"
                                                        class="form-control @error('poin5') is-invalid @enderror"
                                                        value="{{ old('poin5') }}" autofocus placeholder="">
                                                    @error('poin5')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 1</text><br><br>
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
