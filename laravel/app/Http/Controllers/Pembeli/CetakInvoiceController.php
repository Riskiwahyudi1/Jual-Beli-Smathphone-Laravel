<?php

namespace App\Http\Controllers\Pembeli;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PDF;

class CetakInvoiceController extends Controller
{
    public function generateInvoice()
    {
        $data = ['title' => 'Invoice', 'date' => date('m/d/Y'), 'invoice_id' => 123];
        $pdf = PDF::loadView('pembeli.invoice', $data);
        
        return $pdf->download('invoice.pdf');
    }
}
