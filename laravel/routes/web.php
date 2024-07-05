<?php
use Illuminate\Support\Facades\Route;

// pembeli
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Pembeli\HomeController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Pembeli\DetailController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Pembeli\InvoiceController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminIklanController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Pembeli\CheckoutController;
use App\Http\Controllers\Admin\AdminProdukController;

// admin
use App\Http\Controllers\Pembeli\KeranjangController;
use App\Http\Controllers\Pembeli\TransaksiController;
use App\Http\Controllers\Penjual\KelolaStokController;
use App\Http\Controllers\Admin\AdminDataUserController;
use App\Http\Controllers\Admin\AdminExpedisiController;
use App\Http\Controllers\Pembeli\ViewPenjualController;
use App\Http\Controllers\Penjual\HomePenjualController;
use App\Http\Controllers\Admin\AdminPengaduanController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Pembeli\CetakInvoiceController;

// Penjual
use App\Http\Controllers\penjual\TambahProdukController;
use App\Http\Controllers\Penjual\ProdukPenjualController;
use App\Http\Controllers\Penjual\StatusOrderanController;
use App\Http\Controllers\Pembeli\LayananPenggunaController;
use App\Http\Controllers\Pembeli\RegisterPembeliController;
use App\Http\Controllers\penjual\RegisterPenjualController;
use App\Http\Controllers\penjual\LayananPenggunaPenjualController;


// Route Pembeli
Route::middleware(['guest'])->group(function () {
Route::get('/', function () { return redirect('/home');});
Route::get('/register-pembeli', [RegisterPembeliController::class, 'index']);
Route::post('/register-pembeli', [RegisterPembeliController::class, 'store']);
Route::get('/register-penjual', [RegisterPenjualController::class, 'index']);
Route::post('/register-penjual', [RegisterPenjualController::class, 'store']);
Route::get('/login-user', [LoginUserController::class, 'login'])->name('login');
Route::post('/login-user', [LoginUserController::class, 'authenticate']);
Route::get('admin-login', [LoginAdminController::class, 'loginAdmin'])->name('admin.login');
Route::post('admin-login', [LoginAdminController::class, 'login']);
});

Route::get('/home', [HomeController::class, 'home'])->name('/home');
Route::post('/logout', [LoginUserController::class, 'logout']);

// pembeli
Route::middleware(['auth', 'role:buyer'])->group(function () {
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
Route::get('/invoice/{transaksi:id}', [CetakInvoiceController::class, 'generateInvoice'])->name('generate.pdf');
Route::get('/layanan-pengguna', [LayananPenggunaController::class, 'layananPengguna']);
Route::post('/layanan-pengguna', [LayananPenggunaController::class, 'store']);
Route::get('/view-penjual', [ViewPenjualController::class, 'viewPenjual']);

});

// penjual

Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual'])->name('/home-penjual');
    Route::get('/kelola-stok', [KelolaStokController::class, 'kelolaStok']);
    Route::post('/kelola-stok-tambah', [KelolaStokController::class, 'kelolahStokTambah']);
    Route::post('/kelola-stok-edit', [KelolaStokController::class, 'kelolahStokEdit']);
    Route::get('/status-orderan', [StatusOrderanController::class, 'statusOrderan']);
    Route::post('/status-orderan-konfirmasi', [StatusOrderanController::class, 'konfirmasiTransaksi']);
    Route::post('/status-orderan-batalkan', [StatusOrderanController::class, 'batalkanTransaksi']);
    Route::post('/status-orderan-kirim', [StatusOrderanController::class, 'kirimTransaksi']);
    Route::get('/produk-penjual', [ProdukPenjualController::class, 'produkPenjual'])->name('/produk-penjual');
    Route::get('/tambah-produk-penjual', [TambahProdukController::class, 'index'])->name('/tambah-produk');
    Route::get('/produk-penjual/search', [ProdukPenjualController::class, 'search'])->name('produk-penjual.search');
    Route::resource('/crud-produk', TambahProdukController::class);
    Route::get('/layanan-pengguna-penjual', [LayananPenggunaPenjualController::class, 'layananPenggunaPenjual']);
    Route::post('/layanan-pengguna', [LayananPenggunaPenjualController::class, 'store']);
});

// admin
Route::middleware(['admin'])->group(function () {
    Route::get('/home-admin', [HomeAdminController::class, 'homeAdmin'])->name('home.admin');
    Route::get('/admin-transaksi', [AdminTransaksiController::class, 'adminTransaksi']);
    Route::get('/admin-data-user', [AdminDataUserController::class, 'adminDataUser']);
    Route::get('/admin-brand', [AdminBrandController::class, 'adminbrand']);
    Route::get('/admin-expedisi', [AdminExpedisiController::class, 'adminexpedisi']);
    Route::get('/admin-iklan', [AdminIklanController::class, 'adminiklan']);
    Route::get('/admin-pengaduan', [AdminPengaduanController::class, 'adminpengaduan']);
    Route::post('/admin-pengaduan', [AdminPengaduanController::class, 'done']);
    Route::get('/admin-produk', [AdminProdukController::class, 'adminProduk']);
    Route::Post('/admin-produk-verifikasi', [AdminProdukController::class, 'verifikasiProduk']);
    Route::Post('/admin-produk-tolak', [AdminProdukController::class, 'tolakProduk']);
    Route::get('/admin-detail-produk/{produk:id}', [AdminProdukController::class, 'detailProduk']);
    Route::post('/admin-logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

});