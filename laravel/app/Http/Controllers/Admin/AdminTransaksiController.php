<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function adminTransaksi(){
        $transaksis = Transaksi::all();
        return view('admin.admin-transaksi',[
            'title' => 'TeraPhone| Admin Transaksi',
            'transaksis' => $transaksis,
        ]);
    }
}

