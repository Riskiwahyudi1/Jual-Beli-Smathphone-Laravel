<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
         public function welcome(){
            return view('welcome');
      }
      
      public function home()
{
    $produks = Produk::with('kategori')->get();
    $kategoris = Kategori::get();
    $brands = Produk::pluck('brand')->all();
    
    $filters = [
        'search' => request('search'),
        'kategori' => request('kategori'),
        'brand' => request('brand')
    ];

    $search = Produk::homeFilter($filters)->paginate(20);

    return view('home', [
        'produks' => $produks,
        'kategoris' => $kategoris,
        'brands' => $brands,
        'search' => $search,
        'active' => 'Home',
        'title' => 'Home',
    ]);
}

}
