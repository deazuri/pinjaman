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
                            <div class="pull-left">
                                <!-- <strong class="card-title">Data Kriteria</strong> -->
                            </div>
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
                                        <form action="{{ url('/data_kriteria/update/' . $kriteria->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group">
                                                <label for="id_pemohon">Nama Pemohon</label>
                                                <select class="form-select" name="id_pemohon">
                                                    @foreach ($pemohon as $mitra)
                                                    <option
                                                        class="form-control @error('id_pemohon') is-invalid @enderror"
                                                        value="{{ $mitra->id }}" {{ old('id_pemohon', $kriteria->
                                                        id_pemohon)==$mitra->id ?
                                                        'selected' : ''
                                                        }}>{{
                                                        $mitra->nama_pemohon
                                                        }}
                                                        @error('id_pemohon')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pendapatan">Pendapatan</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="pendapatan"
                                                        class="form-control @error('pendapatan') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('pendapatan', $kriteria->pendapatan) }}" />
                                                </div>
                                                <text>ex : 2000000</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="plafond">Jumlah Pinjaman</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="plafond"
                                                        class="form-control @error('plafond') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('plafond', $kriteria->plafond) }}" />
                                                </div>
                                                <text>ex : 2000000</text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="jw">Jangka Waktu</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="jw"
                                                        class="form-control @error('jw') is-invalid @enderror" autofocus
                                                        placeholder="JW" value="{{ old('jw', $kriteria->jw) }}" />
                                                </div>
                                                <text>ex : 20 </text><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="angsuran">Angsuran</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="angsuran"
                                                        class="form-control @error('angsuran') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('angsuran', $kriteria->angsuran) }}" />
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
                                                        autofocus placeholder=""
                                                        value="{{ old('jaminan', $kriteria->jaminan) }}" />
                                                </div>
                                                <text>ex : TV</text><br>
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
</div>
@endsection