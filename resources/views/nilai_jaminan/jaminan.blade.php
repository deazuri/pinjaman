@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Jaminan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                        </div>
                    @endif

                    <form action="/jaminan/tambah" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <b>File Gambar</b><br/>
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                                                <label for="id_pemohon">Nama Mitra</label>
                                                <div class="input-group margin-bottom-sm" style="width: 150px;">
                                                <!-- <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                aria-hidden="true"></i></span> -->
                                                <select class="form-control" name="id_pemohon">
                                                    @foreach ($pemohon as $mitra)
                                                        <option class="form-control @error('id_pemohon') is-invalid @enderror" value="{{ old('id_pemohon') . $mitra->id }}">{{ $mitra->id }} - {{ $mitra->nama_pemohon }}
                                                            @error('id_pemohon')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <b>Nama Jaminan</b>
                                                <input type="text" class="form-control" name="nama_jaminan" style="width: 150px;">
                                            </div>

                                            <div class="form-group">
                                                <label for="id_kriteria">Nilai Jaminan</label>
                                                <div class="input-group margin-bottom-sm" style="width: 150px;">
                                                <!-- <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                aria-hidden="true"></i></span> -->
                                                <select class="form-control" name="id_kriteria">
                                                    @foreach ($kriteria as $kr)
                                                        <option class="form-control @error('id_kriteria') is-invalid @enderror" value="{{ old('id_kriteria') . $kr->id }}">{{ $kr->jaminan }}
                                                            @error('id_kriteria')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                                </div>
                                            </div>

                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>

                    <div class="mt-3 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="20%">File</th>
                                    <th scope="col">Nama Mitra</th>
                                    <th scope="col">Nama Jaminan</th>
                                    <th scope="col">Nilai Jaminan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jaminan as $g)
                                    <tr>
                                        <td><img class="img-fluid" src="{{ url('/data_file/'.$g->file) }}" alt="File"></td>
                                        <td>{{$g->datapemohon->nama_pemohon }}</td>
                                        <td>{{$g->nama_jaminan}}</td>
                                        <td>{{$g->datajaminan->jaminan }}</td>
                                        <td class="text-center">
                                            <a href="/jaminan/edit/{{ $g->id }}" class="btn btn-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/jaminan/delete/{{ $g->id }}" onclick="return confirm('Anda yakin menghapus jaminan ini ?')" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
