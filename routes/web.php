<?php

use App\Models\Penggunaan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaanController;
use App\Models\Pembayaran;

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


//views User
Route::middleware('preventBackHistory', 'auth:pelanggan')->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::get('kwitansi', [PembayaranController::class, 'kwitansi'])->name('kwitansi');
    Route::resource('user', PenggunaanController::class);
});

//views Admin
Route::middleware('preventBackHistory', 'auth:admin', 'ceklevel:1')->group(function () {

    Route::get('/index', [PelangganController::class, 'view']);
    Route::resource('pelanggan', PelangganController::class);

    Route::get('/cetak-pelanggan', [PelangganController::class, 'cetakPelanggan'])->name('cetak-pelanggan');

    Route::resource('tagihan', TagihanController::class);
    Route::resource('tarif', TarifController::class);
    Route::get('konfirmasi-pembayaran', [KonfirmasiController::class, 'index']);
    Route::post('konfirmasi-pembayaran/{id}', [KonfirmasiController::class, 'edit'])->name('konfirmasi-pembayaran');
    // Route::resource('konfirmasi-pembayaran', KonfirmasiController::class);


});

Route::middleware('preventBackHistory', 'auth:admin', 'ceklevel:2')->group(function () {
    Route::get('bank', [TransaksiController::class, 'index']);
    Route::get('konfirmasi/{id}', [TransaksiController::class, 'konfirmasi'])->name('konfirmasi');
    Route::post('konfirmasi/{id}', [TransaksiController::class, 'konfirmasi']);
});


Route::get('search', [AdminController::class, 'index']);
Route::get('autocomplete', [AdminController::class, 'autocomplete'])->name('autocomplete');

//Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'procesLogin']);

//LogOut
Route::get('/logout', [AuthController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
