<?php

namespace App\Http\Controllers\Admin;


use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminTransaksiController extends Controller
{
    public function adminTransaksi(){
        $filters = [
            'status' => request('status'),
            'search' => request('search'),
        ];
    
        $penjualList = Transaksi::distinct()->pluck('penjual');
        $produkTransaksi = [];
    
        foreach ($penjualList as $penjual) {
            $transaksiList = Transaksi::transaksiFilter($filters)
                ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'total_transaksi', 'expedisi', 'id', 'status','bukti_pembayaran', 'alamat')
                ->where('penjual', $penjual)
                ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'total_transaksi', 'expedisi', 'id', 'status', 'bukti_pembayaran', 'alamat')
                ->latest()
                ->get()
                ->groupBy('created_at'); 
                
                if ($transaksiList->isNotEmpty()) {
                    $produkTransaksi[$penjual] = $transaksiList;
                }
            }

        return view('admin.admin-transaksi',[
            'title' => 'Admin Transaksi',
            'active' => 'Admin Transaksi',
            'transaksis' => $produkTransaksi,
        ]);
    }
}

