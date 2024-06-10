<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detailProduk(Produk $produk, $slug) {
    
        $fotos = json_decode($produk->foto);
        return view('detail-produk', [
        "title" => "Detail Produk",
        'getDetail' => $produk,
        'slug' => $slug,
        'fotos' => $fotos
        ]);
    }
}
