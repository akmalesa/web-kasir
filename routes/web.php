<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayananApkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProduktController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\SejarahApkController;
use App\Http\Controllers\TentangApkController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
Route::get('/about', [HomeController::class,'about']);
Route::get('/tentangapk', [TentangApkController::class,'index']);
Route::get('/layananapk', [LayananApkController::class,'index']);
Route::get('/sejarahapk', [SejarahApkController::class,'index']);
Route::resource('kategori', KategoriController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('jenis', JenisController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('meja', MejaController::class);
Route::resource('menu', MenuController::class);
Route::resource('produkt', ProduktController::class);
Route::resource('tranksasi', TransaksiController::class);


