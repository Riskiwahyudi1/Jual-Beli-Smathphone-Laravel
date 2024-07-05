<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewPenjualController extends Controller
{
    public function viewPenjual(Request $request){
        $user = User::where('username', $request->user)->first();
        $auth = $user->id ;
        $filters = [
            'search' => request('search'),
            'kategori' => request('kategori'),
            'brand' => request('brand'),
            'user' => request('user')
        ];
        $brands = Produk::where('user_id', $auth)->pluck('brand')->all();
        $search = Produk::populerFilter($filters)->where('status', 'terverifikasi')->paginate(20);
        $kategoris = Kategori::get();

        $penjualan = 0;
        $getPenjualan = Produk::where('user_id', $auth)->pluck('terjual')->all();
        $penjualan += array_sum($getPenjualan);
        
        $jmlProdukToko = Produk::where('user_id', $auth)
                        ->where('status', 'terverifikasi')
                        ->get();

        return view('pembeli.view-penjual', [
         'title' => 'View Penjual',
         'active' => 'View Penjual',
         'search' => $search,
        'brands' => $brands,
        'kategoris' => $kategoris,
        'penjualan' => $penjualan,
        'jmlProdukToko' => $jmlProdukToko->count(),
        ]);
    }

}
