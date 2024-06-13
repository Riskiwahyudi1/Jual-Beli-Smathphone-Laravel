<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
   
    public function riwayatTransaksi()
    {
        
    
        return view('riwayat-transaksi', [
            'title' => 'Riwayat Transaksi',
           
        ]);
    }

}
