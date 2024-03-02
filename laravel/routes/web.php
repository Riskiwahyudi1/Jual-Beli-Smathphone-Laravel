<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\InvoiceController;



Route::get('/login', [LoginController::class, 'login']);
Route::get('/landingPage', [LandingPageController::class, 'landingPage']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/listBarang', [ListBarangController::class, 'listBarang']);
Route::get('/invoice', [InvoiceController::class, 'invoice']);
