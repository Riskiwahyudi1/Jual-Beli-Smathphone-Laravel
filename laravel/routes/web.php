<?php

use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomePenjualController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LayananPenggunaController;




Route::get('/login', [LoginController::class, 'login']);
Route::get('/home', [HomeController::class, 'home']);
// Route::get('/invoice', [InvoiceController::class, 'invoice']);
Route::get('/detail/{produk:id}{slug}', [DetailController::class, 'detail']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/layanan-pengguna', [LayananPenggunaController::class, 'layananPengguna']);

// route penjual 
Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual']);

