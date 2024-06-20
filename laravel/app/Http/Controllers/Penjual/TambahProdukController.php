<?php

namespace App\Http\Controllers\penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TambahProdukController extends Controller
{
    public function index(){
        return view('penjual.tambah-produk-penjual',[
            'title' => 'Tambah Produk'
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'diskon' => 'required|integer',
            
        ]);
        // $data = [
        //     'prosesor' => 'required',
        //     'dimensi' => 'required',
        //     'resolusi' => 'required',
        //     'ram_rom' => 'required',
        //     'berat' => 'required',
        //     'layar' => 'required',
        //     'baterai' => 'required',
        //     'pengisi_daya' => 'required',
        //     'tipe_layar' => 'required',
        // ];

        $produk = new Produk();
        $produk->nama = $request->input('nama-depan');
        $produk->harga = $request->input('harga-produk');
        $produk->kategori = $request->input('kategori');
        $produk->deskripsi = $request->input('deskripsi-produk');
        $produk->stok = $request->input('pengisi-daya');
        $produk->diskon = $request->input('tipe-layar');
        $produk->spesifikasi = $request->input('prosesor');
        $produk->dimensi = $request->input('dimensi');
        $produk->resolusi = $request->input('resolusi');
        $produk->ram_rom = $request->input('ram-rom');
        $produk->berat = $request->input('berat');
        $produk->layar = $request->input('layar');
        $produk->baterai = $request->input('baterai');
        $produk->pengisi_daya = $request->input('pengisi-daya');
        $produk->tipe_layar = $request->input('tipe-layar');
        
        $produk->save();

        return redirect()->route('/tambah-produk');
    }
}
