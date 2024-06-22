<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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


    
    $userId = Auth::id();
    $user = Auth::user();
    $pembeliList = Transaksi::distinct()->pluck('user_id');
    $produkTransaksi = [];
    
    foreach ($pembeliList as $pembeli) {
        $transaksiList = Transaksi::
            select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status','bukti_pembayaran') // Memastikan kolom yang tepat digunakan
            ->where('user_id', $pembeliList)
            ->where('penjual', $user->username)
            ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status', 'bukti_pembayaran')
            ->latest()
            ->get()
            ->groupBy('created_at'); 
            
            if ($transaksiList->isNotEmpty()) {
                $produkTransaksi[$pembeli] = $transaksiList;
            } 
            
            // informasi card
            $jumlahTransaksi = 0;
            $dikemas = 0;
            $menungguPembayaran = 0;
            $dikirim = 0;
            $selesai = 0;
            $dibatalkan = 0;

            foreach ($produkTransaksi as $penjual => $transaksiListByTime) {
                foreach ($transaksiListByTime as $createdAt => $transaksiList) {
                    $jumlahTransaksi += $transaksiList->count();
                    $dikemas += $transaksiList->where('status', 'dikemas')->count();
                    $menungguPembayaran += $transaksiList->where('status', 'menunggu-pembayaran')->count();
                    $dikirim += $transaksiList->where('status', 'dikirim')->count();
                    $selesai += $transaksiList->where('status', 'selesai')->count();
                    $dibatalkan += $transaksiList->where('status', 'dibatalkan')->count();
                }
            }
        }
        
       
        return view('penjual.home-penjual', [
            'title' => 'Home Penjual',
            'active' => 'home-penjual',
            'totalTransaksi' => $jumlahTransaksi,
            'menungguPembayaran' => $menungguPembayaran,
            'dikemas' => $dikemas,
            'dikirim' => $dikirim,
            'selesai' => $selesai,
            'dibatalkan' => $dibatalkan,
            'transaksis' => $produkTransaksi,

        ]);
        
    }
}
