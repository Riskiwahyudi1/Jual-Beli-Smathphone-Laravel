<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class keranjangController extends Controller
{
    public function keranjang(){
        $action = 'hapus';
        return view('pembeli.keranjang', [
         'title' => 'Keranjang',
         'action' => $action,
         'produks' => Keranjang::where('user_id', Auth::id())->get()
        ]);
    }
    public function simpanProduk(Request $request){
    
        $userId = Auth::id();

        $validasiData = $request->validate([
            'produk_id' => 'required|exists:produks,id',
        ]);
    
        //cek produk jika ada di keranjang
        $keranjangItem = Keranjang::where('user_id', $userId)
                              ->where('produk_id', $validasiData['produk_id'])
                              ->first();

    if ($keranjangItem) {
        // Jika produk sudah ada, biarkan apa adanya
        return redirect()->back()->with('info', 'Produk sudah ada di keranjang!');
    } else {
        // Jika produk belum ada, tambahkan produk baru ke keranjang
        $validasiData['user_id'] = $userId;
        Keranjang::create($validasiData);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }
    }


    
    public function hapusProduk(Request $request){
        // Mendapatkan ID produk yang di-checklist dari input
        $productIds = $request->input('check-produk-hapus',[]);
        $action = $request->input('action');

        if ($action == 'hapus') {
            if (!empty($productIds)) {
                // Menghapus produk yang ada dalam array productIds
                Keranjang::whereIn('id', $productIds)->delete();
                return redirect()->back()->with('success', 'Produk yang dipilih berhasil dihapus.');
            }elseif(empty($productIds)){
                return redirect()->back()->with('failed', 'Silahkan pilih produk yg ingin di hapus');
            }
        }
    }

}
