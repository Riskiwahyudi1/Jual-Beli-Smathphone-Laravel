<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Kategori;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{

    public function riwayatTransaksi()
{
    $userId = Auth::id();
    $filters = [
        'status' => request('status'),
    ];

    // Mengambil daftar penjual yang unik dari transaksi
    $penjualList = Transaksi::distinct()->pluck('penjual');
    $produkTransaksi = [];

    foreach ($penjualList as $penjual) {
        $transaksiList = Transaksi::transaksiFilter($filters)
            ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status','bukti_pembayaran')
            ->where('user_id', $userId)
            ->where('penjual', $penjual)
            ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'id', 'status', 'bukti_pembayaran')
            ->latest()
            ->get()
            ->groupBy('created_at'); 
            
            if ($transaksiList->isNotEmpty()) {
                $produkTransaksi[$penjual] = $transaksiList;
            }
        }
        
        return view('riwayat-transaksi', [
            'title' => 'Riwayat Transaksi',
            'status' => ['menunggu-pembayaran', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'],
            'transaksis' => $produkTransaksi,
        ]);
    }
    public function batalkanTransaksi(Request $request){
        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            
            $transaksi->status = 'Dibatalkan'; 
            $transaksi->save(); 
        }
        return redirect()->back()->with('pembatalan-sukses', 'Transaksi dibatalkan ');
    }
    
    public function pembayaran(Request $request)
    {
        $request->validate([
            'bukti-transaksi.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'transaksi-id.*' => 'required|integer|exists:transaksis,id',
        ]);
        
        $buktiTransaksiFiles = $request->file('bukti-transaksi');
        $transaksiIds = $request->input('transaksi-id');
        
        foreach ($transaksiIds as $index => $transaksiId) {
            
            $file = $buktiTransaksiFiles[$index];
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'images/buktiPembayaran/';
            $file->move(public_path($destinationPath), $fileName);
            $transaksi = Transaksi::findOrFail($transaksiId);
            
            $transaksi->bukti_pembayaran = $fileName;
            $transaksi->save();
        }

        return back()->with('bukti-pembayaran-success', 'Berhasil dikirim, tunggu verifikasi penjual!');
    }
    
}
// ->havingRaw('COUNT(DISTINCT produk_id) > 1')