<?php

namespace App\Http\Controllers\Pembeli;

use PDF;
use App\Models\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CetakInvoiceController extends Controller
{
    public function generateInvoice(Transaksi $transaksi)
    {
        // return view('pembeli.invoice', [

        //     'transaksi' => $transaksi
        // ]);
        $transaksi = ['transaksi' => $transaksi];
        $pdf = PDF::loadView('pembeli.invoice', $transaksi);
        
        return $pdf->download('invoice.pdf');
    }
}
