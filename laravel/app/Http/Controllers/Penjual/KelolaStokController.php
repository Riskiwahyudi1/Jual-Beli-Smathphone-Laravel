<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KelolaStokController extends Controller
{
    public function kelolaStok(){
        $filters = [
            'search' => request('search'),
        ];
        $auth = Auth::id();
        $produks = Produk::populerFilter($filters)->with('kategori', 'user')->where('user_id', $auth)->paginate(10);
        
        return view('penjual.kelola-stok',[
            'title' => 'Kelola Stok Produk',
            'active' => 'kelola-stok',
            'produks' => $produks
        ]);
    }
    public function kelolahStokTambah(Request $request)
    {
        $request->validate([
            'tambah-stok.*' => 'required|integer|min:1',
            'produk-id' => 'required|integer|exists:produks,id',
        ]);

        $productId = $request->input('produk-id');
        $editStok = $request->input('tambah-stok')[0];  
        $product = Produk::find($productId);
        if ($product) {
            $product->stok += $editStok;
            $product->save();
            return redirect()->back()->with('success', 'Stok produk berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }
    public function kelolahStokEdit(Request $request)
    {
        $request->validate([
            'edit-stok.*' => 'required|integer|min:1',
            'produk-id' => 'required|integer|exists:produks,id',
        ]);

        $productId = $request->input('produk-id');
        $editStok = $request->input('edit-stok')[0];  
        $product = Produk::find($productId);
        if ($product) {
            $product->stok = $editStok;
            $product->save();
            return redirect()->back()->with('success', 'Stok produk berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }
}
