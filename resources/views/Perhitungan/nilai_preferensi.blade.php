@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Nilai Preferensi</h3>
                </div><!-- /.col -->
                @can('Perhitungan')
                <div class="col-sm-6 d-flex justify-content-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Hasil Topsis
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/nilai_matriks_ternormalisasi">Nilai Matriks
                                    Ternormalisasi</a></li>
                            <li><a class="dropdown-item" href="/ternormalisasi_terbobot">Nilai Matriks ternormalisasi
                                    Terbobot</a></li>
                            <li><a class="dropdown-item" href="/matriks_ideal">Matriks Solusi Ideal Positif &
                                    Negatif</a></li>
                            <li><a class="dropdown-item" href="/jarak_solusi_ideal">Jarak Solusi Ideal Positif &
                                    Negatif</a></li>
                            <li><a class="dropdown-item" href="/nilai_preferensi">Nilai Preferensi</a></li>
                        </ul>
                    </div>
                </div><!-- /.col -->
                @endcan
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
                                <a href="/nilai_preferensi/cetak" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-print"></i> Print
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">V1</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                    @foreach($nilaiPreferensi as $preferensi)
                                        <tr>
                                            <td>{{ $preferensi['nomor_urut'] }}</td>
                                            <td>{{ $preferensi['nama'] }}</td>
                                            <td>{{ $preferensi['nilai'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody> -->
                                    <tbody>
                                        @foreach($nilaiPreferensi as $preferensi)
                                        @if($preferensi['nomor_urut'] <= 50) <tr>
                                            <td>{{ $preferensi['nomor_urut'] }}</td>
                                            <td>{{ $preferensi['nama'] }}</td>
                                            <td>{{ $preferensi['nilai'] }}</td>
                                            </tr>
                                            @endif
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