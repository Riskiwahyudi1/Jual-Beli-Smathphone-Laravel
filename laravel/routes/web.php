<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KelolaStokController;
use App\Http\Controllers\HomePenjualController;
use App\Http\Controllers\LoginPembeliController;
use App\Http\Controllers\LayananPenggunaController;
use App\Http\Controllers\RegisterPembeliController;
use App\Http\Controllers\AdminTransaksiController;





Route::get('/register-pembeli', [RegisterPembeliController::class, 'index']);
Route::post('/register-pembeli', [RegisterPembeliController::class, 'store']);
Route::get('/login-pembeli', [LoginPembeliController::class, 'login'])->name('login');
Route::post('/login-pembeli', [LoginPembeliController::class, 'authenticate']);
Route::post('/logout', [LoginPembeliController::class, 'logout']);
Route::get('/home', [HomeController::class, 'home']);
// Route::get('/invoice', [InvoiceController::class, 'invoice']);
Route::get('/detail-produk/{produk:id}{slug}', [DetailController::class, 'detailProduk']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/layanan-pengguna', [LayananPenggunaController::class, 'layananPengguna']);

// route penjual 
Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual']);
Route::get('/kelola-stok', [KelolaStokController::class, 'kelolaStok']);

// route admin
Route::get('/admin-transaksi', [AdminTransaksiController::class, 'adminTransaksi']);


