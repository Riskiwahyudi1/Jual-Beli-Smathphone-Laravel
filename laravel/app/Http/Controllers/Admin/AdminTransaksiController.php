<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function adminTransaksi(){
        $transaksis = Transaksi::latest()->get();
        $produks = Produk::get();
        return view('admin.admin-transaksi',[
            'title' => 'TeraPhone| Admin Transaksi',
            'transaksis' => $transaksis,
            'produks' => $produks,
        ]);
    }
}

