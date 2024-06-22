<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdukPenjualController extends Controller
{
    public function produkpenjual(){

        $auth = Auth::id();
        $produks = Produk::with('kategori', 'user')->where('user_id', $auth)->paginate(10);
        return view('penjual.produk-penjual',[
            'title' => 'Produk Penjual',
            'active' => 'produk-penjual',
            'produks' => $produks
        ]);
    }
}
