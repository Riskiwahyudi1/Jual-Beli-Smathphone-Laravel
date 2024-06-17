<?php

namespace App\Http\Controllers\Pembeli;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Kategori;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
            ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'expedisi', 'id', 'status','bukti_pembayaran', 'alamat')
            ->where('user_id', $userId)
            ->where('penjual', $penjual)
            ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'expedisi', 'id', 'status', 'bukti_pembayaran', 'alamat')
            ->latest()
            ->get()
            ->groupBy('created_at'); 
            
            if ($transaksiList->isNotEmpty()) {
                $produkTransaksi[$penjual] = $transaksiList;
            }
        }
        
        return view('pembeli.riwayat-transaksi', [
            'title' => 'Riwayat Transaksi',
            'status' => ['menunggu-pembayaran', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'],
            'transaksis' => $produkTransaksi,
        ]);
    }
    public function batalkanTransaksi(Request $request){
        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->produk->stok = $transaksi->produk->stok + $transaksi->jumlah ;
            $transaksi->produk->terjual = $transaksi->produk->terjual - $transaksi->jumlah ;
            $transaksi->status = 'Dibatalkan'; 
            $transaksi->save(); 
            $transaksi->produk->save(); 
        }
        return redirect()->back()->with('pembatalan-sukses', 'Transaksi dibatalkan ');
    }
    public function terimaTransaksi(Request $request){
        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->status = 'selesai'; 
            $transaksi->save(); 
        }
        return redirect()->back()->with('produk-diterima-sukses', 'Transaksi Selesai');
    }
    
    public function pembayaran(Request $request)
    {
        $request->validate([
            'bukti-transaksi.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'transaksi-id.*' => 'required|integer|exists:transaksis,id',
        ]);
        
        // ambil data bukti transaksi
        $buktiTransaksiFiles = $request->file('bukti-transaksi');
        $transaksiIds = $request->input('transaksi-id');
        
        // kelolah file
        $file = $buktiTransaksiFiles;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = 'images/buktiPembayaran/';
        $file->move(public_path($destinationPath), $fileName);

        foreach ($transaksiIds as $index => $transaksiId) {
            
            $transaksi = Transaksi::findOrFail($transaksiId);
            $transaksi->bukti_pembayaran = $fileName;
            $transaksi->save();
        }

        return back()->with('bukti-pembayaran-success', 'Berhasil dikirim, tunggu verifikasi penjual!');
    }
    
}








// ->havingRaw('COUNT(DISTINCT produk_id) > 1')