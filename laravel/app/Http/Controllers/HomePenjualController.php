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


        return view('/penjual/home-penjual', [
            'title' => 'Home Penjual',
            'totalTransaksi' => $totalTransaksi,
            'menungguPembayaran' => $menungguPembayaran,
            'dikemas' => $dikemas,
            'dikirim' => $dikirim,
            'selesai' => $selesai,
            'dibatalkan' => $dibatalkan,
            'transaksiTerbaru' => $transaksiTerbaru,

        ]);
        
    }
}
