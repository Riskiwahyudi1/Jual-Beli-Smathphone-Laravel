<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function detailProduk(Produk $produk, $slug) {
    
        $fotos = json_decode($produk->foto);
        return view('pembeli.detail-produk', [
        "title" => "Detail Produk",
        'getDetail' => $produk,
        'slug' => $slug,
        'fotos' => $fotos
        ]);
    }
}
