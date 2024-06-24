<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class StatusOrderanController extends Controller
{
    public function statusOrderan(){

    $userId = Auth::id();
    $user = Auth::user();
    $pembeliList = Transaksi::distinct()->pluck('user_id');
    $filters = [
        'status' => request('status'),
        'search' => request('search'),
    ];
    $produkTransaksi = [];
    
    foreach ($pembeliList as $pembeli) {
        $transaksiList = Transaksi::transaksiFilter($filters)
            ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status','bukti_pembayaran') 
            ->where('penjual', $user->username)
            ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status', 'bukti_pembayaran')
            ->latest()
            ->get()
            ->groupBy('created_at'); 
            
            if ($transaksiList->isNotEmpty()) {
                $produkTransaksi[$pembeli] = $transaksiList;
            } 
            
        }
        return view('penjual.status-orderan',[
            'title' => 'Status Orderan ',
            'active' => 'status-orderan',
            'status' => ['menunggu-pembayaran', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'],
            'transaksis' => $produkTransaksi,
        
        ]);
    }
    public function konfirmasiTransaksi(Request $request){

        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->status = 'dikemas'; 
            $transaksi->save(); 
            $transaksi->produk->save(); 
        }
        return redirect()->back()->with('konfirmasi-sukses', 'Berhasil konfirmasi');
    }
    public function batalkanTransaksi(Request $request){

        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->status = 'dibatalkan'; 
            $transaksi->save(); 
            $transaksi->produk->save(); 
        }
        return redirect()->back()->with('pembatalan-sukses', 'Pembatalan berhasil');
    }
}
