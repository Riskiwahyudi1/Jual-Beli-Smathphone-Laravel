<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewPenjualController extends Controller
{
    public function viewPenjual(){
        $filters = [
            'search' => request('search'),
            'kategori' => request('kategori'),
            'brand' => request('brand'),
            'user' => request('user')
        ];
        $brands = Produk::pluck('brand')->all();
        $search = Produk::populerFilter($filters)->where('status', 'Terverifikasi')->paginate(20);
        $kategoris = Kategori::get();

        return view('pembeli.view-penjual', [
         'title' => 'View Penjual',
         'active' => 'View Penjual',
         'search' => $search,
        'brands' => $brands,
        'kategoris' => $kategoris,
        ]);
    }

}
