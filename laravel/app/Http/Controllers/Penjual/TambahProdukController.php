<?php

namespace App\Http\Controllers\penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TambahProdukController extends Controller
{
    public function store(){
        return view('penjual.tambah-produk-penjual',[
            'title' => 'Tambah Produk'
        ]);
    }
}
