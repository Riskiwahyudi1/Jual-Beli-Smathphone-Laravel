<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Detail;



Route::get('/login', [LoginController::class, 'login']);
Route::get('/landingPage', [LandingPageController::class, 'landingPage']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/home', [Home::class, 'home']);
Route::get('/invoice', [InvoiceController::class, 'invoice']);
Route::get('/detail', [Detail::class, 'detail']);
