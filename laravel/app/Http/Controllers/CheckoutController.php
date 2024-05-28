<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('checkout',[
            'title' => 'Checkout',
            'active' => 'checkout',
            'kategoris' => Kategori::all(),
        ]);
    }
    public function getProduk(request $request){
        $productIds = $request->input('check-produk', []);
        $jumlah = $request->input('jumlah', []);
        if (!empty($productIds)) {
            $products = Produk::whereIn('id', $productIds)->get();
        } else {
            $products = collect();
        }
        $jumlahProduk = [];
        foreach ($productIds as $productId) {
            // Cari indeks dari productId dalam array productIds
            $index = array_search($productId, $request->input('check-produk'));
            if ($index !== false && isset($jumlah[$index])) {
                $jumlahProduk[$productId] = $jumlah[$index];
            } else {
                $jumlahProduk[$productId] = 1; // atau nilai default lainnya
            }
        }

        return view('checkout', [
            'products' => $products,
            'jumlah' => $jumlahProduk,
            'title' => 'Checkout'
        ]);  
    }
}
