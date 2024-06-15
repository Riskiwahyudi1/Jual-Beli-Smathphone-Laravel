<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomePenjualController extends Controller
{
    public function homePenjual(){
        

        $totalTransaksi = Transaksi::with('produk')->get();
        $menungguPembayaran = Transaksi::with('produk')->where('status', 'menunggu-pembayaran')->get();
        $dikemas = Transaksi::with('produk')->where('status', 'dikemas')->get();
        $dikirim = Transaksi::with('produk')->where('status', 'dikirim')->get();
        $selesai = Transaksi::with('produk')->where('status', 'selesai')->get();
        $dibatalkan = Transaksi::with('produk')->where('status', 'dibatalkan')->get();
        // $transaksiTerbaru = Transaksi::paginate(10);


    
    // $userId = Auth::id();
    $pembeliList = Transaksi::distinct()->pluck('user_id');
    $produkTransaksi = [];
    
    foreach ($pembeliList as $pembeli) {
        $transaksiList = Transaksi::
            select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status','bukti_pembayaran') // Memastikan kolom yang tepat digunakan
            ->where('user_id', $pembeliList)
            // ->where('penjual', $penjual)
            ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status', 'bukti_pembayaran')
            ->latest()
            ->get()
            ->groupBy('created_at'); 
            
            if ($transaksiList->isNotEmpty()) {
                $produkTransaksi[$pembeli] = $transaksiList;
            }
        }
        
       
        return view('/penjual/home-penjual', [
            'title' => 'Home Penjual',
            'totalTransaksi' => $totalTransaksi,
            'menungguPembayaran' => $menungguPembayaran,
            'dikemas' => $dikemas,
            'dikirim' => $dikirim,
            'selesai' => $selesai,
            'dibatalkan' => $dibatalkan,
            'transaksis' => $produkTransaksi,

        ]);
        
    }
}
