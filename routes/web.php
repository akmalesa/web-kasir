<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DataController;
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
use App\Http\Controllers\StokController;
use App\Http\Controllers\TentangApkController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'halamaLogin'])->name('login');
Route::post('/login/cek',[LoginController::class, 'cekLogin'])->name('cekLogin');
Route::get('/about', [HomeController::class,'about']);
Route::get('/tentangapk', [TentangApkController::class,'index']);
Route::get('/layananapk', [LayananApkController::class,'index']);
Route::get('/sejarahapk', [SejarahApkController::class,'index']);
Route::get('/grafik', [DataController::class,'index']);



Route::resource('menu', MenuController::class);
Route::get('export/menu', [MenuController::class,'exportData'])->name('export-menu');
Route::post('/menu/import', [MenuController::class,'import'])->name('import-menu');


Route::resource('jenis', JenisController::class);
Route::get('export/jenis', [JenisController::class,'exportData'])->name('export-jenis');
Route::post('/jenis/import', [JenisController::class,'import'])->name('import-jenis');



Route::resource('kategori', KategoriController::class);
Route::post('/kategori/import', [KategoriController::class,'import'])->name('import-kategori');
Route::get('export/kategori', [KategoriController::class,'exportData'])->name('export-kategori');



Route::resource('stok', StokController::class);
Route::get('export/stok', [StokController::class,'exportData'])->name('export-stok');
Route::post('/stok/import', [StokController::class,'import'])->name('import-stok');




Route::resource('pelanggan', PelangganController::class);
Route::get('export/pelanggan', [PelangganController::class,'exportData'])->name('export-pelanggan');
Route::post('/pelanggan/import', [PelangganController::class, 'import'])->name('import-pelanggan');



Route::resource('pemesanan', PemesananController::class);
Route::resource('meja', MejaController::class);
Route::resource('menu', MenuController::class);
Route::resource('produkt', ProduktController::class);
Route::resource('tranksasi', TransaksiController::class);
Route::resource('absensi', AbsensiController::class);



