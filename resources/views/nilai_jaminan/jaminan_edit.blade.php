@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Jaminan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                                <a href=" {{ url('/jaminan') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/jaminan/update/' . $jaminan->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="file">File Gambar</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="file" name="file"
                                                        class="form-control @error('file') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old( 'file', $jaminan->file) }}" />
                                                </div>
                                                @if($jaminan->file)
                                                    <input type="hidden" name="file" value="{{ $jaminan->file }}">
                                                    <img class="img-fluid" src="{{ url('/data_file/'.$jaminan->file) }}" alt="File" style="height: 100px">
                                                @endif
                                                @error('file')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="id_pemohon">Nama Pemohon</label>
                                                <select class="form-select" name="id_pemohon">
                                                    @foreach ($pemohon as $mitra)
                                                    <option
                                                        class="form-control @error('id_pemohon') is-invalid @enderror"
                                                        value="{{ $mitra->id }}" {{ old('id_pemohon', $jaminan->
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
                                                <label for="nama_jaminan">Nama Jaminan</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <!-- <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span> -->
                                                    <input type="text" name="nama_jaminan"
                                                        class="form-control @error('nama_jaminan') is-invalid @enderror"
                                                        autofocus placeholder=""
                                                        value="{{ old('nama_jaminan', $jaminan->nama_jaminan) }}" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kriteria">Nilai Jaminan</label>
                                                <select class="form-select" name="id_kriteria">
                                                    @foreach ($kriteria as $kr)
                                                    <option
                                                        class="form-control @error('id_kriteria') is-invalid @enderror"
                                                        value="{{ $kr->id }}" {{ old('id_kriteria', $kr->
                                                            id_kriteria)==$kr->id ?
                                                        'selected' : ''
                                                        }}>{{
                                                            $kr->jaminan
                                                        }}
                                                        @error('id_kriteria')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </option>
                                                    @endforeach
                                                </select>
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

