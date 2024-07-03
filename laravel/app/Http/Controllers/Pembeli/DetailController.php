<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function detailProduk(Produk $produk, $slug) {

        $auth = $produk->user->id ;
        
        $spesifikasi = is_string($produk->spesifikasi) ? json_decode($produk->spesifikasi, true) : $produk->spesifikasi;
        $fotos = json_decode($produk->foto);
        
        $penjualan = 0;
        $getPenjualan = Produk::where('user_id', $auth)->pluck('terjual')->all();
        $penjualan += array_sum($getPenjualan);
        
        $jmlProdukToko = Produk::where('user_id', $auth)
                        ->where('status', 'terverifikasi')
                        ->get();

        return view('pembeli.detail-produk', [
        "title" => "Detail Produk",
        'getDetail' => $produk,
        'spesifikasi' => $spesifikasi,
        'slug' => $slug,
        'fotos' => $fotos,
        'penjualan' => $penjualan,
        'jmlProdukToko' => $jmlProdukToko->count(),
        ]);
    }
}
