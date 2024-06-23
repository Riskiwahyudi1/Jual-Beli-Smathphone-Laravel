<?php

namespace App\Http\Controllers\penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailProdukPenjualController extends Controller
{
    public function detailProduk(){
        return view('penjual.detail-produk-penjual', [
            'title' => 'Detail Produk',
            'active' => 'detail-produk'
        ]);
    }
}
