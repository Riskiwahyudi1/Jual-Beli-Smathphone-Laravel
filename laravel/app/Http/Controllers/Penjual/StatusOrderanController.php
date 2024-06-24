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
        'status' => request('search'),
    ];
    $produkTransaksi = [];
    
    foreach ($pembeliList as $pembeli) {
        $transaksiList = Transaksi::transaksiFilter($filters)
            ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status','bukti_pembayaran') // Memastikan kolom yang tepat digunakan
            ->where('user_id', $pembeliList)
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
    // public function search(Request $request)
    // {
    //     $query = $request->input('search');
    //     $user = Auth::id();
    //     $produksSearch = Produk::where('nama_produk', 'LIKE', "%{$query}%")
    //                     ->where('user_id', $user)
    //                     ->paginate(10); 

    //     return view('penjual.status-orderan', compact('produksSearch', 'query'),[
    //         'title' => "Status Orderan",
    //         'active' => 'status-orderan'
    //     ]);
    // }
}
