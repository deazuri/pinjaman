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
              <!-- <li class="breadcrumb-item active">Dashboard Peramalan Tingkat Kinerja Sales Honda Kartika Sari Putra Dinoyo</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <div class="content mt-3"> <div class="animated fadeIn">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
        <div class="pull-left">
        <!-- <strong class="card-title">Pemohon</strong> -->
        </div>
        <div class="pull-right">
        <a href=" {{ url('/data_tabel_kriteria') }}" class="btn btn-secondary btn-sm">
            <i class="fa fa-undo"></i>Back
            </a>
    </div>
</div>
<div class="card-body table-responsive">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{ url('/data_tabel_kriteria/update/' . $tabel->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="kode_kr">Kode Kriteria</label>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                    aria-hidden="true"></i></span>
                            <input type="text" name="kode_kr"
                                class="form-control @error('kode_kr') is-invalid @enderror" autofocus placeholder=""
                                value="{{ old('kode_kr', $tabel->kode_kr) }}" />
                        </div>
                        <text>ex : C1</text><br><br>
                    </div>
                    <div class="form-group">
                        <label for="kriteria">Kriteria</label>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input type="text" name="kriteria"
                                class="form-control @error('kriteria') is-invalid @enderror" autofocus placeholder=""
                                value="{{ old('kriteria', $tabel->kriteria) }}" />
                        </div>
                        <text>ex : Pendapatan</text><br><br>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                        aria-hidden="true"></i></span>
                                <select class="form-select" name="keterangan">
                                    <!-- <option selected> Pilih Keterangan</option> -->
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
                                <!-- <input type="text" name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror" autofocus
                                    placeholder="" value="{{ old('keterangan', $tabel->keterangan) }}" /> -->
                            </div>
                            <text>ex : Cost</text><br><br>
                        </div>

                        <button type="submit" class="btn btn-success" name="edit"><i class="fa fa-edit"></i> Edit
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
@endsection