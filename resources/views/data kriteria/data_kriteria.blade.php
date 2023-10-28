@extends('layout.app')
@section('content')

<div class="content-wrapper" style="min-height: 690.2px;"> <!-- Content Header (Page header) --> <div
    class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h1 class="m-0">
    Dashboard</h1>
    </div><!-- /.col --> <div class="col-sm-6"> <ol class="breadcrumb float-sm-right"> <li class="breadcrumb-item"><a
        href="#">Home</a></li> <!-- <li class="breadcrumb-item active">Dashboard Peramalan Tingkat Kinerja Sales Honda
        Kartika Sari Putra Dinoyo</li> --> </ol>
</div><!-- /.col -->
</div><!-- /.row --> </div><!-- /.container-fluid --> </div>
<div class="content mt-3">
    <div class="animated fadeIn"> <!-- @if (session('status')) <div class="alert alert-success"> {{ session('status') }}
        </div> @endif -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong class="card-title"></strong>
                        </div>
                        <div class="pull-right">
                            <a href="/data_pemohon/tambah" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <a href="/manufacture/cetak" class="btn btn-secondary btn-sm">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <a href="/manufacture/trash" class="btn btn-danger btn-sm">
                                <i class="fa fa-clipboard"></i> Trash
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Mitra</th>
                                        <th scope="col">Usia</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Mitra</th>
                                        <th scope="col">Usia</th>
                                        <th scope="col">Alamat</th>
                                        <td><button type="button" class="btn btn-warning mr-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModaledit">
                                                Edit
                                            </button><button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModaldetail">
                                                Delete
                                            </button></td>

                                </tbody>
                                <!-- Modal  -->
                                <div class="modal fade" id="exampleModaledit" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Detail  -->
                                <div class="modal fade" id="exampleModaldetail" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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