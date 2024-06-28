<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function detailProduk(Produk $produk, $slug) {
    
        $spesifikasi = is_string($produk->spesifikasi) ? json_decode($produk->spesifikasi, true) : $produk->spesifikasi;
        $fotos = json_decode($produk->foto);
        return view('pembeli.detail-produk', [
        "title" => "Detail Produk",
        'getDetail' => $produk,
        'spesifikasi' => $spesifikasi,
        'slug' => $slug,
        'fotos' => $fotos
        ]);
    }
}
