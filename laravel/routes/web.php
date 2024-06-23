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
use App\Http\Controllers\Pembeli\CheckoutController;
use App\Http\Controllers\Pembeli\KeranjangController;
use App\Http\Controllers\Pembeli\LayananPenggunaController;

// admin
use App\Http\Controllers\Pembeli\TransaksiController;
use App\Http\Controllers\Penjual\KelolaStokController;
use App\Http\Controllers\Admin\AdminDataUserController;
use App\Http\Controllers\Admin\AdminExpedisiController;
use App\Http\Controllers\Penjual\HomePenjualController;
use App\Http\Controllers\Admin\AdminPengaduanController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Pembeli\CetakInvoiceController;
use App\Http\Controllers\Admin\AdminProdukController;

// Penjual
use App\Http\Controllers\penjual\TambahProdukController;
use App\Http\Controllers\Penjual\ProdukPenjualController;
use App\Http\Controllers\Penjual\StatusOrderanController;
use App\Http\Controllers\Pembeli\RegisterPembeliController;
use App\Http\Controllers\penjual\RegisterPenjualController;
use App\Http\Controllers\penjual\LayananPenggunaPenjualController;


// Route Pembeli
Route::get('/', function () { return redirect('/home');});
Route::get('/register-pembeli', [RegisterPembeliController::class, 'index']);
Route::post('/register-pembeli', [RegisterPembeliController::class, 'store']);
Route::get('/register-penjual', [RegisterPenjualController::class, 'index']);
Route::post('/register-penjual', [RegisterPenjualController::class, 'store']);
Route::get('/login-user', [LoginUserController::class, 'login'])->name('login');
Route::post('/login-user', [LoginUserController::class, 'authenticate']);
Route::post('/logout', [LoginUserController::class, 'logout']);
Route::get('/home', [HomeController::class, 'home'])->name('/home');
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


// route penjual 
Route::get('/kelola-stok', [KelolaStokController::class, 'kelolaStok']);
Route::get('/status-orderan', [StatusOrderanController::class, 'statusOrderan']);
Route::get('/produk-penjual', [ProdukPenjualController::class, 'produkPenjual'])->name('/produk-penjual');
Route::get('/tambah-produk-penjual', [TambahProdukController::class, 'index'])->name('/tambah-produk');
Route::resource('/crud-produk', TambahProdukController::class);

Route::get('/layanan-pengguna-penjual', [LayananPenggunaPenjualController::class, 'layananPenggunaPenjual']);

// route admin
Route::get('/admin-transaksi', [AdminTransaksiController::class, 'adminTransaksi']);
Route::get('/home-admin', [HomeAdminController::class, 'homeAdmin']);
Route::get('/admin-data-user', [AdminDataUserController::class, 'adminDataUser']);
Route::get('/admin-brand', [AdminBrandController::class, 'adminbrand']);
Route::get('/admin-expedisi', [AdminExpedisiController::class, 'adminexpedisi']);
Route::get('/admin-iklan', [AdminIklanController::class, 'adminiklan']);
Route::get('/admin-pengaduan', [AdminPengaduanController::class, 'adminpengaduan']);
Route::get('/admin-produk', [AdminProdukController::class, 'adminProduk']);




// login role user penjual dan pembeli
Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/home-penjual', [HomePenjualController::class, 'homePenjual'])->name('/home-penjual');
});