<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProdukController extends Controller
{
    public function adminProduk(){
        $produks = Produk::all();
        return view('admin.admin-produk',[
            'title' => 'TeraPhone| Admin Produk',
            'produks' => $produks,
        ]);
    }
}
