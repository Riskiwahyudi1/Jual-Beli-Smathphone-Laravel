<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProdukController extends Controller
{
    public function adminProduk(){
        $filters = [
            'search' => request('search'),
            'status' => request('status')
        ];
    
        $search = Produk::verivikasiFilter($filters)->paginate(20);
        return view('admin.admin-produk',[
            'title' => 'Admin Produk',
            'active' => 'Admin Produk',
            'produks' => $search,
        ]);
    }
    public function verifikasiProduk(Request $request){

        $ProdukIds = $request->input('produk-id', []);
        
        foreach ($ProdukIds as $ProdukId) {
            
            $ProdukId = Produk::findOrFail($ProdukId); 
            $ProdukId->status = 'terverifikasi'; 
            $ProdukId->save(); 
        }
        return redirect()->back()->with('verifikasi-sukses', 'Berhasil Verifikasi');
    
    }
    public function tolakProduk(Request $request){

        $ProdukIds = $request->input('produk-id', []);
        
        foreach ($ProdukIds as $ProdukId) {
            
            $ProdukId = Produk::findOrFail($ProdukId); 
            $ProdukId->status = 'pengajuan-ditolak'; 
            $ProdukId->save(); 
        }
        return redirect()->back()->with('penolakan-sukses', 'Produk Ditolak');
    
    }
    public function detailProduk($id)
    {
        $produk = Produk::findOrFail($id);
        $spesifikasi = is_string($produk->spesifikasi) ? json_decode($produk->spesifikasi, true) : $produk->spesifikasi;
        $fotos = json_decode($produk->foto);
        return view('admin.admin-detail-produk', compact('produk'), [
            'title' => 'Detail Produk',
            'active' => 'detail-produk',
            'spesifikasi' => $spesifikasi,
            'fotos' => $fotos
        ]);
    }
}
