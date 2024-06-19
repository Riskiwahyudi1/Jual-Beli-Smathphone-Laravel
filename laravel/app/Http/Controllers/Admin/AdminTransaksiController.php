<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTransaksiController extends Controller
{
    public function adminTransaksi(){
        return view('admin.admin-transaksi',[
            'title' => 'TeraPhone| Admin Transaksi',
        
        ]);
    }
}

