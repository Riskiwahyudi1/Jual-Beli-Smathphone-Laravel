<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProdukPenjualController extends Controller
{
    public function produkpenjual(){
        return view('penjual.produk-penjual',[
            'title' => 'Produk Penjual',
        
        ]);
    }
}
