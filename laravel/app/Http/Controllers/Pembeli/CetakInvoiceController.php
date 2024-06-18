<?php

namespace App\Http\Controllers\Pembeli;

use PDF;
use App\Models\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CetakInvoiceController extends Controller
{
    public function generateInvoice(Transaksi $transaksi)
{
    $userId = Auth::id();
    $penjualList = Transaksi::where('user_id', $userId)->distinct()->pluck('penjual');
    $produkTransaksi = [];

    foreach ($penjualList as $penjual) {
        $transaksiList = Transaksi::
            select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'total_transaksi', 'expedisi', 'id', 'status','bukti_pembayaran', 'alamat')
            ->where('user_id', $userId)
            ->where('penjual', $penjual)
            ->get()
            ->groupBy('created_at');

        if ($transaksiList->isNotEmpty()) {
            $produkTransaksi[$penjual] = $transaksiList;
        }
    }

    // return view('pembeli.invoice', [
    //     'transaksi' => $transaksi,
    //     'transaksiProduks' => $produkTransaksi,
    // ]);
    
        $transaksi = ['transaksi' => $transaksi, 'transaksiProduks' => $produkTransaksi];
        $pdf = PDF::loadView('pembeli.invoice', $transaksi);
        
        return $pdf->download('TeraPhone invoice.pdf');
}
}