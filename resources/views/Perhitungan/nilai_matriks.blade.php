@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nilai Matrik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Next
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/nilai_matriks_ternormalisasi">Nilai Matriks Ternormalisasi</a></li>
                        <li><a class="dropdown-item" href="/ternormalisasi_terbobot">Nilai Matriks ternormalisasi Terbobot</a></li>
                        <li><a class="dropdown-item" href="/matriks_ideal">Matriks Solusi Ideal Positif & Negatif</a></li>
                        <li><a class="dropdown-item" href="/jarak_solusi_ideal">Jarak Solusi Ideal Positif & Negatif</a></li>
                        <li><a class="dropdown-item" href="/nilai_preferensi">Nilai Preferensi</a></li>
                    </ul>
                </div>
            </div>/.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
        <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <div class="pull-right">
                                <a href=" {{ url('/nilai_matriks') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div> -->
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/nilai_matriks/store') }}" method="post">
                                            @csrf
                                            <!-- <div class="form-group">
                                                <label for="id_alternatif">Id Alternatif</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="id_alternatif"
                                                        class="form-control @error('id_alternatif') is-invalid @enderror"
                                                        value="{{ old('id_alternatif') }}" autofocus placeholder="">
                                                    @error('id_alternatif')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_kriteria">Id Kriteria</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                                aria-hidden="true"></i></span>
                                                        <input type="text" name="id_kriteria"
                                                            class="form-control @error('id_alternatif') is-invalid @enderror"
                                                            value="{{ old('id_kriteria') }}" autofocus placeholder="">
                                                        @error('id_kriteria')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div> -->
                                            <div class="form-group">
                                                <label for="kode">Id Alternatif</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <select class="form-control" name="id">
                                                        @foreach ($alternatif as $alternatif)
                                                        <option
                                                            class="form-control @error('id_alternatif') is-invalid @enderror"
                                                            value="{{ old('id') . $alternatif->id }}">
                                                            {{ $alternatif->id }} - {{ $alternatif->nama_pemohon }}
                                                            @error('id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </option>
                                                        @endforeach
                                                    </select><br>
                                                </div>
                                            </div>
                                            @foreach ($kriteriaList as $item)
                                            <div class="form-group">
                                                <label for="kode">{{ $item->nama_kriteria }}</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="hidden" name="id_kriteria[]"
                                                        value="{{ $item->id_kriteria }}">
                                                    <select class="form-control" name="nilai[]">
                                                        <option value="{{ $item->poin1 }}">{{
                                                            $item->poin1 }}</option>
                                                        <option value="{{ $item->poin2 }}">{{
                                                            $item->poin2 }}</option>
                                                        <option value="{{ $item->poin3 }}">{{
                                                            $item->poin3 }}</option>
                                                        <option value="{{ $item->poin4 }}">{{
                                                            $item->poin4 }}</option>
                                                        <option value="{{ $item->poin5 }}">{{
                                                            $item->poin5 }}</option>
                                                    </select><br>
                                                </div>
                                            </div>
                                            @endforeach
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