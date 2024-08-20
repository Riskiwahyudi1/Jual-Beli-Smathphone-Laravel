<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Pembeli\TransaksiController;

class HomeController extends Controller
{
    // turunan class TransaksiController
    protected $infoTransaksi;
    public function __construct(TransaksiController $transaksi)
    {
        $this->infoTransaksi = $transaksi;
    }

    
    public function dataProduk()
    {
    
    // metode dependency injection construct TransaksiController
    $data = $this->infoTransaksi->riwayatTransaksi();

    $jumlahTransaksi = 0;

    if (isset($data['jumlahTransaksi'])) {
        $jumlahTransaksi = $data['jumlahTransaksi'];
    }

    $produks = Produk::with('kategori')->get();
    $kategoris = Kategori::get();
    $diskons = Produk::with('kategori')->where('diskon', '>', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi')->orderByDesc('terjual')->get();
    $brands = Produk::where('diskon', '>', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi')->pluck('brand')->all();
    $keranjangInfo = Keranjang::with(['produk' => function($query) { $query->where('stok', '>', 0);}])->where('user_id', Auth::id())->get();
    $cameraQualityProduk = Kategori::with(['produk' => function($query) {$query->where('diskon', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi');}])->findOrFail(3);
    $midRangeProduk = Kategori::with(['produk' => function($query) {$query->where('diskon', 0)->where('stok', '>', 0)->where('status', 'Terverifikasi');}])->findOrFail(4);
    $filters = [
                'search' => request('search'),
                'kategori' => request('kategori'),
                'brand' => request('brand')
            ];
    $search = Produk::populerFilter($filters)->where('status', 'Terverifikasi')->orderByDesc('terjual')->paginate(20);
    
    $user = Auth::user();

    if ($user) {
        $userRole = $user->role;

        if ($userRole === 'seller') {
            $nullDataUser = User::where('id', $user->id)
                ->where(function($query) {
                    $query->where('name', '')
                        ->orWhere('no_hp', '')
                        ->orWhere('alamat', '')
                        ->orWhere(function($subQuery) {
                            $subQuery->where('rekening', '')
                                ->orWhere('rekening', '[]');
                        });
                })->exists();
        } else {
            $nullDataUser = User::where('id', $user->id)
                ->where(function($query) {
                    $query->where('name', '')
                        ->orWhere('no_hp', '')
                        ->orWhere('alamat', '');
                })->exists();
        }
    } else {
        $nullDataUser = false;
    }

    return [
        'cameraQuality' => $cameraQualityProduk,
        'midRange' => $midRangeProduk,
        'produks' => $produks,
        'kategoris' => $kategoris,
        'brands' => $brands,
        'search' => $search,
        'diskons' => $diskons,
        'keranjangInfo' => $keranjangInfo,
        'TransaksiInfo' => $jumlahTransaksi,
        'nullDataUser' => $nullDataUser
    ];
    }
    public function welcome(){

        $data = $this->dataProduk();
        return view('/welcome', [
            'cameraQuality' => $data['cameraQuality'],
            'midRange' => $data['midRange'],
            'produks' => $data['produks'],
            'kategoris' => $data['kategoris'],
            'brands' => $data['brands'],
            'search' => $data['search'],
            'active' => 'Home',
            'title' => 'Home',
            'diskons' => $data['diskons'],
            'keranjangInfo' => $data['keranjangInfo'],
            'TransaksiInfo' => $data['TransaksiInfo'],
        ]);
    }
    public function home(){

        $data = $this->dataProduk();
        
        return view('pembeli.home', [
            'cameraQuality' => $data['cameraQuality'],
            'midRange' => $data['midRange'],
            'produks' => $data['produks'],
            'kategoris' => $data['kategoris'],
            'brands' => $data['brands'],
            'search' => $data['search'],
            'active' => 'Home',
            'title' => 'Home',
            'diskons' => $data['diskons'],
            'keranjangInfo' => $data['keranjangInfo'],
            'TransaksiInfo' => $data['TransaksiInfo'],
            'nullDataUser' => $data['nullDataUser'],
        ]);
    }
}
