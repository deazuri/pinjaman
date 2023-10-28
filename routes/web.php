<?php

use App\Http\Controllers\PemohonController;
use Illuminate\Support\Facades\Route;
use App\Models\Pemohon;

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
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/app', function () {
//     return view('layout/app');
// });
Route::get('/data_pemohon', [PemohonController::class, 'index']);
Route::get('/data_pemohon/tambah', [PemohonController::class, 'create']);

Route::get('/pemohon', function () {
    return view('data pemohon/data_pemohon');
});

Route::get('/kriteria', function () {
    return view('data kriteria/data_kriteria');
});
// Route::get('/inventory/tambah', [InventoryController::class, 'create']);
// Route::post('/inventory/store', [InventoryController::class, 'store']);
// route::get('/inventory/cetak', [InventoryController::class, 'cetak'])->name('inventory');
// Route::get('/inventory/edit/{id_bahan}', [InventoryController::class, 'edit']);
// Route::put('/inventory/update/{id_bahan}', [InventoryController::class, 'update']);
// Route::get('/inventory/delete/{id_bahan}', [InventoryController::class, 'delete']);
// Route::get('/inventory/destroy/{id_bahan}', [InventoryController::class, 'destroy']);
// Route::get('/inventory/trash', [InventoryController::class, 'trash']);
// Route::get('/inventory/restore/{id_bahan?}', [InventoryController::class, 'restore']);
// Route::get('/inventory/deleteall/{id_bahan?}', [InventoryController::class, 'deleteall']);
