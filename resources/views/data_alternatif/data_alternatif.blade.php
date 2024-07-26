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
                            <a href="/data_alternatif/tambah" class="btn btn-success btn-sm">
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
                                        <!-- <th scope="col">Kode Alternatif</th> -->
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatif as $alter)
                                    <tr>
                                        <!-- <td>{{ $alter->kode }}</td> -->
                                        <td>{{ $alter->datapemohon->nama_pemohon }}</td>
                                        <td class="text-center">
                                            <a href="/data_alternatif/edit/{{ $alter->id_alternatif }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="/data_alternatif/delete/{{ $alter->id_alternatif }}" class="btn btn-danger btn-sm">
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