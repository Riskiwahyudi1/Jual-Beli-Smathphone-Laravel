<?php
use Illuminate\Support\Facades\Route;

// pembeli
use App\Http\Controllers\Pembeli\HomeController;
use App\Http\Controllers\Pembeli\DetailController;
use App\Http\Controllers\Pembeli\InvoiceController;
use App\Http\Controllers\Pembeli\CheckoutController;
use App\Http\Controllers\Pembeli\KeranjangController;
use App\Http\Controllers\Pembeli\LoginPembeliController;
use App\Http\Controllers\Pembeli\LayananPenggunaController;
use App\Http\Controllers\Pembeli\RegisterPembeliController;
use App\Http\Controllers\Pembeli\TransaksiController;
use App\Http\Controllers\Pembeli\DataUserController;

// admin
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminExpedisiController;
use App\Http\Controllers\AdminIklanController;

// Penjual
use App\Http\Controllers\Penjual\StatusOrderanController;
use App\Http\Controllers\Penjual\KelolaStokController;
use App\Http\Controllers\Penjual\HomePenjualController;




// Route Pembeli
Route::get('/', function () { return redirect('/home');});
Route::get('/register-pembeli', [RegisterPembeliController::class, 'index']);
Route::post('/register-pembeli', [RegisterPembeliController::class, 'store']);
Route::get('/login-pembeli', [LoginPembeliController::class, 'login'])->name('login');
Route::post('/login-pembeli', [LoginPembeliController::class, 'authenticate']);
Route::post('/logout', [LoginPembeliController::class, 'logout']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/detail-produk/{produk:id}{slug}', [DetailController::class, 'detailProduk'])->middleware('auth');
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->middleware('auth');
Route::post('/hapus-produk', [keranjangController::class, 'hapusProduk']);
Route::post('/tambah-keranjang', [KeranjangController::class, 'simpanProduk'])->middleware('auth');
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'getProduk']);
Route::post('/konfirmasi-checkout', [CheckoutController::class, 'konfirmasiCheckout']);
Route::post('/checkout-dari-detail', [CheckoutController::class, 'getProduk']);

Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayatTransaksi']);
Route::post('/riwayat-transaksi', [TransaksiController::class, 'pembayaran']);
Route::post('/riwayat-transaksi-batalkan', [TransaksiController::class, 'batalkanTransaksi']);
Route::post('/riwayat-transaksi-diterima', [TransaksiController::class, 'terimaTransaksi']);

Route::get('/layanan-pengguna', [LayananPenggunaController::class, 'layananPengguna']);
Route::post('/layanan-pengguna', [LayananPenggunaController::class, 'store']);


// route penjual 
Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual']);
Route::get('/kelola-stok', [KelolaStokController::class, 'kelolaStok']);
Route::get('/status-orderan', [StatusOrderanController::class, 'statusOrderan']);

// route admin
Route::get('/admin-transaksi', [AdminTransaksiController::class, 'adminTransaksi']);
Route::get('/home-admin', [HomeAdminController::class, 'homeAdmin']);
Route::get('/data-user', [DataUserController::class, 'dataUser']);
Route::get('/admin-brand', [AdminBrandController::class, 'adminbrand']);
Route::get('/admin-expedisi', [AdminExpedisiController::class, 'adminexpedisi']);
Route::get('/admin-iklan', [AdminIklanController::class, 'adminiklan']);

