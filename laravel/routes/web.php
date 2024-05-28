<?php

use App\Http\Controllers\Detail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomePenjualController;
use App\Http\Controllers\KeranjangController;



Route::get('/login', [LoginController::class, 'login']);
Route::get('/landingPage', [LandingPageController::class, 'landingPage']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/invoice', [InvoiceController::class, 'invoice']);
Route::get('/detail/{produk:id}{slug}', [Detail::class, 'detail']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);

// route penjual 
Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual']);

