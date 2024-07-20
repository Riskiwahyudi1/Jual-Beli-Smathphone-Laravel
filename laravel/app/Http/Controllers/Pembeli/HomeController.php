<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pembeli\TransaksiController;

class HomeController extends Controller
{
    // turunan class TransaksiController
    protected $infoTransaksi;
    public function __construct(TransaksiController $transaksi)
    {
        $this->infoTransaksi = $transaksi;
    }

    
    public function home()
    {
    
    // metode dependency injection construct TransaksiController
    $data = $this->infoTransaksi->riwayatTransaksi();

    // Inisialisasi $jumlahTransaksi dengan nilai default 0
    $jumlahTransaksi = 0;

    // Ambil nilai $jumlahTransaksi dari hasil riwayat transaksi jika tersedia
    if (isset($data['jumlahTransaksi'])) {
        $jumlahTransaksi = $data['jumlahTransaksi'];
    }

    $produks = Produk::with('kategori')->get();
    $kategoris = Kategori::get();
    $diskons = Produk::with('kategori')->where('diskon', '>', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi')->get();
    $brands = Produk::where('diskon', '>', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi')->pluck('brand')->all();
    $keranjangInfo = Keranjang::with(['produk' => function($query) { $query->where('stok', '>', 0);}])->where('user_id', Auth::id())->get();
    $cameraQualityProduk = Kategori::with(['produk' => function($query) {$query->where('diskon', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi');}])->findOrFail(3);
    $midRangeProduk = Kategori::with(['produk' => function($query) {$query->where('diskon', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi');}])->findOrFail(4);
    $filters = [
                'search' => request('search'),
                'kategori' => request('kategori'),
                'brand' => request('brand')
            ];
    $search = Produk::populerFilter($filters)->where('status', 'Terverifikasi')->paginate(20);

    return view('pembeli.home', [
        'cameraQuality' => $cameraQualityProduk,
        'midRange' => $midRangeProduk,
        'produks' => $produks,
        'kategoris' => $kategoris,
        'brands' => $brands,
        'search' => $search,
        'active' => 'Home',
        'title' => 'Home',
        'diskons' => $diskons,
        'keranjangInfo' => $keranjangInfo,
        'TransaksiInfo' => $jumlahTransaksi
    ]);
}

}
