@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    {{-- get message --}}
    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
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
                            <a href="/data_kriteria/tambah" class="btn btn-success btn-sm">
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
                                        <th scope="col">Nama Mitra</th>
                                        <th scope="col">Pendapatan</th>
                                        <th scope="col">Jumlah Pinjaman</th>
                                        <th scope="col">Jangka Waktu</th>
                                        <th scope="col">Angsuran</th>
                                        <th scope="col">Nilai Jaminan</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriteria as $kr)
                                    <tr>
                                        <td>{{ $kr->datapemohon->nama_pemohon }}</td>
                                        <td>{{ $kr->pendapatan }}</td>
                                        <td>{{ $kr->plafond }}</td>
                                        <td>{{ $kr->jw }}</td>
                                        <td>{{ $kr->angsuran }}</td>
                                        <td>{{ $kr->jaminan }}
                                        <!-- <ol class="breadcrumb float-sm-right">
                                            <a class="btn btn-info" href="/jaminan" role="button">Jaminan</a>
                                            </ol> -->
                                             </td>
                                        <td class="text-center">
                                            <a href="/data_kriteria/edit/{{ $kr->id}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="/data_kriteria/delete/{{ $kr->id }}" class="btn btn-danger btn-sm">
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