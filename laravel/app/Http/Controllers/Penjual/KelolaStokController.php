<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KelolaStokController extends Controller
{
    public function kelolaStok(){
        $auth = Auth::id();
        $produks = Produk::with('kategori', 'user')->where('user_id', $auth)->paginate(10);
        
        return view('penjual.kelola-stok',[
            'title' => 'Kelola Stok Produk',
            'active' => 'kelola-stok',
            'produks' => $produks
        ]);
    }
    public function kelolahStokTambah(Request $request){
        $produkid = $request->input['produk-id'];
        $validasiData = $request->validate([
            'tambah-stok' => 'required|integer',    
        ]);
    
        $produk = $produkid; 
        $produk->stok += $validasiData['tambah-stok']; 
        $produk->save(); 
    
        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }
    
}
