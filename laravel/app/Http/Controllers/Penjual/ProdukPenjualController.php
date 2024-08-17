<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class ProdukPenjualController extends Controller
{
    public function produkpenjual(){

        $auth = Auth::id();
        $filters = [
            'search' => request('search'),
            'kategori' => request('kategori'),
            'brand' => request('brand')
        ];
        $User = User::find($auth);
        $rekening = json_decode($User->rekening, true); 

        $produks = Produk::with('kategori', 'user')->populerFilter($filters)->where('user_id', $auth)->orderByDesc('terjual')->paginate(10)->withQueryString();
        return view('penjual.produk-penjual',[
            'title' => 'Produk Penjual',
            'active' => 'produk-penjual',
            'produks' => $produks,
            'rekening' => $rekening
        ]);
    }
    
}
