<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
         public function welcome(){
            return view('welcome');
      }
      public function home()
{
    $produks = Produk::with('kategori')->get();
    $diskons = Produk::with('kategori')->where('diskon', '!=', 0)->get();
    $kategoris = Kategori::get();
    $brands = Produk::pluck('brand')->all();
    $filters = [
        'search' => request('search'),
        'kategori' => request('kategori'),
        'brand' => request('brand')
    ];

    $search = Produk::populerFilter($filters)->paginate(20);

    return view('home', [
         'cameraQuality' => Kategori::with(['produk' => function($query) {$query->where('diskon', '=', 0);}])->findOrFail(3),
         'midRange' => Kategori::with(['produk' => function($query) {$query->where('diskon', '=', 0);}])->findOrFail(4),
        'produks' => $produks,
        'kategoris' => $kategoris,
        'brands' => $brands,
        'search' => $search,
        'active' => 'Home',
        'title' => 'Home',
        'diskons' => $diskons,
        // 'keranjangInfo' => Keranjang::where('user_id', Auth::id())->get(),
        // 'TransaksiInfo' => Transaksi::where('user_id', Auth::id())->whereNotIn('status', ['selesai', 'dibatalkan'])->get()
    ]);
}

}
