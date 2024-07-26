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
              <!-- <li class="breadcrumb-item active">Data Pemohon </li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content-header --> 
    <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            <a href="/datakriteria/tambah" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <!-- <a href="/data_pemohon/cetak" class="btn btn-secondary btn-sm">
                                <i class="fa fa-print"></i> Print -->
                            </a>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Poin 1</th>
                                        <th scope="col">Poin 2</th>
                                        <th scope="col">Poin 3</th>
                                        <th scope="col">Poin 4</th>
                                        <th scope="col">Poin 5</th>
                                        <th scope="col">Sifat</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteriaList as $kriteria)
                                    <tr>
                                        <td>{{ $kriteria->nama_kriteria }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>{{ $kriteria->poin1 }}</td>
                                        <td>{{ $kriteria->poin2 }}</td>
                                        <td>{{ $kriteria->poin3 }}</td>
                                        <td>{{ $kriteria->poin4 }}</td>
                                        <td>{{ $kriteria->poin5 }}</td>
                                        <td>{{ $kriteria->sifat }}</td>
                                        <td class="text-center">
                                            <a href="/datakriteria/edit/{{ $kriteria->id_kriteria }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="/datakriteria/delete/{{ $kriteria->id_kriteria }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                     @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection