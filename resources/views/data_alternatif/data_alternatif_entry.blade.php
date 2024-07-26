@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Alternatif</h1>
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
                                <a href=" {{ url('/data_alternatif') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_alternatif/store') }}" method="post">
                                            @csrf
                                            <!-- <div class="form-group">
                                                <label for="kode">Kode Alternatif</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="kode"
                                                        class="form-control @error('kode') is-invalid @enderror"
                                                        value="{{ old('kode') }}" autofocus
                                                        placeholder="">
                                                    @error('kode')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 0001</text><br>
                                            </div> -->
                                             <div class="form-group">
                                                <label for="id">Nama Alternatif</label>
                                                <div class="input-group margin-bottom-sm">
                                                <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                aria-hidden="true"></i></span>
                                                <select class="form-control" name="id">
                                                    @foreach ($pemohon as $pemohon)
                                                        <option class="form-control @error('id') is-invalid @enderror" value="{{ old('id') . $pemohon->id }}">{{ $pemohon->id }} - {{ $pemohon->nama_pemohon }}
                                                            @error('id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                </div>
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
