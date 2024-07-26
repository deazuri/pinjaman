@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Nilai Matriks Ternormalisasi Terbobot</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Hasil Topsis
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/nilai_matriks_ternormalisasi">Nilai Matriks Ternormalisasi</a></li>
                        <li><a class="dropdown-item" href="/ternormalisasi_terbobot">Nilai Matriks ternormalisasi Terbobot</a></li>
                        <li><a class="dropdown-item" href="/matriks_ideal">Matriks Solusi Ideal Positif & Negatif</a></li>
                        <li><a class="dropdown-item" href="/jarak_solusi_ideal">Jarak Solusi Ideal Positif & Negatif</a></li>
                        <li><a class="dropdown-item" href="/nilai_preferensi">Nilai Preferensi</a></li>
                    </ul>
                </div>
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
                                <!-- <a href="/data_pemohon/tambah" class="btn btn-success btn-sm"> -->
                                <!-- <i class="fa fa-plus"></i> Add -->
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
                                            <th scope="col">Nama</th>
                                            <th scope="col">C1</th>
                                            <th scope="col">C2</th>
                                            <th scope="col">C3</th>
                                            <th scope="col">C4</th>
                                            <th scope="col">C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groupedMatriks as $group)
                                                <tr>
                                                    <td>{{ $group['alternatif'] }}</td>
                                                    @foreach($group['data'] as $item)
                                                        <td>{{ $item['nilai_terbobot'] ?? '' }}</td>
                                                    @endforeach
                                            </tr>
                                        @endforeach
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