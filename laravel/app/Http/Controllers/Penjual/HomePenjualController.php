<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Pembeli\HomeController;

class HomePenjualController extends Controller
{
    protected $cekDataUser;
    public function __construct(HomeController $dataUser)
    {
        $this->cekDataUser = $dataUser;
    }

    public function homePenjual(){
        
    $data = $this->cekDataUser->dataProduk();

    $userId = Auth::id();
    $user = Auth::user();
    $produk = Produk::where('user_id', $userId)->get();
    $pembeliList = Transaksi::distinct()->pluck('user_id');
    $produkTransaksi = [];

    // informasi card
    $jumlahTransaksi = 0;
    $jumlahPendapatan = 0;
    $jumlahTransaksiDikemas = 0;
    $jumlahTransaksiMenunggu = 0;
    $jumlahTransaksiDikirim = 0;
    $jumlahTransaksiSelesai = 0;
    $jumlahTransaksiDibatalkan = 0;

    if (isset($data['nullDataUser'])) {
        $nullDataUser = $data['nullDataUser'];
    }
    
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

            foreach ($produkTransaksi as $penjual => $transaksiListByTime) {
                foreach ($transaksiListByTime as $createdAt => $transaksiList) {
                    
                    $jumlahTransaksi ++;

                    $transaksiListValid = $transaksiList->filter(function ($transaksi) {
                        return $transaksi->status == 'selesai';
                    });                    
                    foreach ($transaksiListValid as $transaksi) {
                        $jumlahPendapatan += ($transaksi->produk->harga - ($transaksi->produk->diskon / 100 * $transaksi->produk->harga)) * $transaksi->jumlah + $transaksiListValid->first()->ongkir;
                    }
                    if ($transaksiList->where('status', 'dikemas')->isNotEmpty()) {
                        $jumlahTransaksiDikemas++;
                    }else if($transaksiList->where('status', 'menunggu-pembayaran')->isNotEmpty()){
                        $jumlahTransaksiMenunggu++;
                    }else if($transaksiList->where('status', 'dikirim')->isNotEmpty()){
                        $jumlahTransaksiDikirim++;
                    }else if($transaksiList->where('status', 'selesai')->isNotEmpty()){
                        $jumlahTransaksiSelesai++;
                    }else if($transaksiList->where('status', 'Dibatalkan')->isNotEmpty()){
                        $jumlahTransaksiDibatalkan++;
                    }
                   
                    
                }
            }
        }
        
       
        return view('penjual.home-penjual', [
            'title' => 'Home Penjual',
            'active' => 'home-penjual',
            'totalProduk' => $produk->count(),
            'jumlahPendapatan' => $jumlahPendapatan,
            'totalTransaksi' => $jumlahTransaksi,
            'menungguPembayaran' => $jumlahTransaksiMenunggu,
            'dikemas' => $jumlahTransaksiDikemas,
            'dikirim' => $jumlahTransaksiDikirim,
            'selesai' => $jumlahTransaksiSelesai,
            'dibatalkan' => $jumlahTransaksiDibatalkan,
            'transaksis' => $produkTransaksi,
            'nullDataUser' => $nullDataUser,

        ]);
        
    }
}