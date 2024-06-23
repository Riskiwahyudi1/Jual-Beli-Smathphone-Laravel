<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomePenjualController extends Controller
{
    public function homePenjual(){
        

        // $totalTransaksi = Transaksi::with('produk')->get();
        // $menungguPembayaran = Transaksi::with('produk')->where('status', 'menunggu-pembayaran')->get();
        // $dikemas = Transaksi::with('produk')->where('status', 'dikemas')->get();
        // $dikirim = Transaksi::with('produk')->where('status', 'dikirim')->get();
        // $selesai = Transaksi::with('produk')->where('status', 'selesai')->get();
        // $dibatalkan = Transaksi::with('produk')->where('status', 'dibatalkan')->get();
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
            $jumlahTransaksiDikemas = 0;
            $jumlahTransaksiMenunggu = 0;
            $jumlahTransaksiDikirim = 0;
            $jumlahTransaksiSelesai = 0;
            $jumlahTransaksiDibatalkan = 0;

            foreach ($produkTransaksi as $penjual => $transaksiListByTime) {
                foreach ($transaksiListByTime as $createdAt => $transaksiList) {
                    $jumlahTransaksi ++;
                    if ($transaksiList->where('status', 'dikemas')->isNotEmpty()) {
                        $jumlahTransaksiDikemas++;
                    }else if($transaksiList->where('status', 'menunggu-pembayaran')->isNotEmpty()){
                        $jumlahTransaksiMenunggu++;
                    }else if($transaksiList->where('status', 'dikirim')->isNotEmpty()){
                        $jumlahTransaksiDikirim++;
                    }else if($transaksiList->where('status', 'selesai')->isNotEmpty()){
                        $jumlahTransaksiSelesai++;
                    }else if($transaksiList->where('status', 'dibatalkan')->isNotEmpty()){
                        $jumlahTransaksiDibatalkan++;
                    }
                   
                    
                }
            }
        }
        
       
        return view('penjual.home-penjual', [
            'title' => 'Home Penjual',
            'active' => 'home-penjual',
            'totalTransaksi' => $jumlahTransaksi,
            'menungguPembayaran' => $jumlahTransaksiMenunggu,
            'dikemas' => $jumlahTransaksiDikemas,
            'dikirim' => $jumlahTransaksiDikirim,
            'selesai' => $jumlahTransaksiSelesai,
            'dibatalkan' => $jumlahTransaksiDibatalkan,
            'transaksis' => $produkTransaksi,

        ]);
        
    }
}
