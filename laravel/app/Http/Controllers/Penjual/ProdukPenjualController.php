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
    public function search(Request $request)
    {
        $query = $request->input('search');
        $user = Auth::id();
        $produksSearch = Produk::where('nama_produk', 'LIKE', "%{$query}%")
                        ->where('user_id', $user)
                        ->paginate(10); 

        return view('penjual.produk-penjual', compact('produksSearch', 'query'),[
            'title' => "Cari Produk",
            'active' => 'cari-produk'
        ]);
    }
}
