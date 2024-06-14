<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function adminTransaksi(){
        return view('/admin/admin-transaksi',[
            'title' => 'TeraPhone| Admin Transaksi',
        
        ]);
    }
}

