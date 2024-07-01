<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ViewPenjualController extends Controller
{
    public function viewPenjual(){
        return view('pembeli.view-penjual', [
         'title' => 'View Penjual',
        
        ]);
    }

}
