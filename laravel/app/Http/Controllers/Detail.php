<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class Detail extends Controller
{
    public function detail(Produk $produk, $slug){

        $fotos = json_decode($produk->foto);
        return view('detail',[
        "title" => "Detail Produk",
         'getDetail' => $produk,
         'slug' => $slug,
         'fotos' => $fotos
        ]);
    }
}
