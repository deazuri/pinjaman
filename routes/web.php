<?php
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DatkerController;
use App\Http\Controllers\JaminanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataKriteriaController;
use App\Http\Controllers\MatriksController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\TabelKriteriaController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/koperasi', function () {
    return view('/layout/koperasi');
});

Route::get('/spk', function () {
    return view('/layout/spk');
});

Route::get('/profile', function () {
    return view('/layout/profile');
});

Route::get('/proses/data_kriteria', [DataKriteriaController::class, 'proses']);

Route::middleware(['auth'])->group(function () {
    Route::get('/data_pemohon', [PemohonController::class, 'index']);
    Route::get('/data_pemohon/tambah', [PemohonController::class, 'create']);
    Route::post('/data_pemohon/store', [PemohonController::class, 'store']);
    Route::get('/data_pemohon/edit/{id}', [PemohonController::class, 'edit']);
    Route::put('/data_pemohon/update/{id}', [PemohonController::class, 'update']);
    Route::get('/data_pemohon/delete/{id}', [PemohonController::class, 'delete']);
    Route::get('/data_pemohon/destroy/{id}', [PemohonController::class, 'destroy']);

    //kriteria    
    Route::get('/data_kriteria', [DataKriteriaController::class, 'index']);
    Route::get('/data_kriteria/tambah', [DataKriteriaController::class, 'create']);
    Route::post('/data_kriteria/store', [DataKriteriaController::class, 'store']);
    Route::get('/data_kriteria/edit/{id}', [DataKriteriaController::class, 'edit']);
    Route::put('/data_kriteria/update/{id}', [DataKriteriaController::class, 'update']);
    Route::get('/data_kriteria/delete/{id}', [DataKriteriaController::class, 'delete']);
    Route::get('/data_kriteria/destroy/{id}', [DataKriteriaController::class, 'destroy']);
    Route::get('/data_kriteria/import', [DataKriteriaController::class, 'create']);
    Route::post('/data_kriteria/import', [DataKriteriaController::class, 'importExcel'])->name('data_kriteria.import_excel');



    //tabel
    Route::get('/data_tabel_kriteria', [TabelKriteriaController::class, 'index']);
    Route::get('/data_tabel_kriteria/tambah', [TabelKriteriaController::class, 'create']);
    Route::post('/data_tabel_kriteria/store', [TabelKriteriaController::class, 'store']);
    Route::get('/data_tabel_kriteria/edit/{id}', [TabelKriteriaController::class, 'edit']);
    Route::put('/data_tabel_kriteria/update/{id}', [TabelKriteriaController::class, 'update']);
    Route::get('/data_tabel_kriteria/delete/{id}', [TabelKriteriaController::class, 'delete']);
    Route::get('/data_tabel_kriteria/destroy/{id}', [TabelKriteriaController::class, 'destroy']);

    //perhitungan
    Route::get('/nilai_matriks', [MatriksController::class, 'create']);
    Route::post('/nilai_matriks/store', [MatriksController::class, 'store']);
    Route::get('/matriks_ternormalisasi', [MatriksController::class, 'index']);
    Route::get('/nilai_matriks_ternormalisasi', [MatriksController::class, 'normalisasi']);
    Route::get('/ternormalisasi_terbobot', [MatriksController::class, 'terbobot']);
    Route::get('/matriks_ideal', [MatriksController::class, 'solusiIdeal']);
    Route::get('/jarak_solusi_ideal', [MatriksController::class, 'hitungJarakSolusiIdeal']);
    Route::get('/nilai_preferensi', [MatriksController::class, 'nilaiPreferensi']);
    Route::get('/nilai_preferensi/cetak', [MatriksController::class, 'nilaiPreferensiPrint']);
    Route::get('/nilai_preferensi/restore/{id}', [MatriksController::class, 'restore']);

    Route::get('/kriteria', [KriteriaController::class, 'index']);
    Route::get('/kriteria/tambah', [KriteriaController::class, 'create']);
    Route::post('/kriteria/store', [KriteriaController::class, 'store']);
    Route::get('/kriteria/edit/{id}', [KriteriaController::class, 'edit']);
    Route::put('/kriteria/update/{id}', [KriteriaController::class, 'update']);
    Route::get('/kriteria/delete/{id}', [KriteriaController::class, 'delete']);
    Route::get('/kriteria/destroy/{id}', [KriteriaController::class, 'destroy']);

    Route::get('/bobot', [BobotController::class, 'index']);
    Route::get('/bobot/tambah', [BobotController::class, 'create']);
    Route::post('/bobot/store', [BobotController::class, 'store']);
    Route::get('/bobot/edit/{id}', [BobotController::class, 'edit']);
    Route::put('/bobot/update/{id}', [BobotController::class, 'update']);
    Route::get('/bobot/delete/{id}', [BobotController::class, 'delete']);
    Route::get('/bobot/destroy/{id}', [BobotController::class, 'destroy']);

    Route::get('/jaminan', [JaminanController::class, 'upload']);
    Route::post('/jaminan/tambah', [JaminanController::class, 'create']);
    Route::get('/jaminan/edit/{id}', [JaminanController::class, 'edit']);
    Route::put('/jaminan/update/{id}', [JaminanController::class, 'update']);
    Route::get('/jaminan/delete/{id}', [JaminanController::class, 'delete']);
});
