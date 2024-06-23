<?php

namespace App\Http\Controllers\penjual;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TambahProdukController extends Controller
{
    public function index(){
        return view('penjual.tambah-produk-penjual',[
            'title' => 'Tambah Produk',
            'active' => 'tambah-produk-penjual'
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'spesifikasi' => 'required|array',
            'spesifikasi.*' => 'nullable|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'diskon' => 'nullable|integer|min:0|max:100',
            'brand' => 'nullable|string|max:255',
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
        ]);

        // Proses upload file foto
        $fotoPaths = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('public/images/foto_produk');
                $fotoPaths[] = str_replace('public/', 'storage/', $path);
            }
        } 

        $validatedData['spesifikasi'] = json_encode($validatedData['spesifikasi']);
    
        $validatedData['user_id'] = auth()->id();

        $validatedData['foto'] = json_encode($fotoPaths);;

      

        try {
            Produk::create($validatedData);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Produk gagal ditambahkan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        
        $produk = Produk::findOrFail($id);
        $spesifikasi = is_string($produk->spesifikasi) ? json_decode($produk->spesifikasi, true) : $produk->spesifikasi;
        $fotos = json_decode($produk->foto);
        return view('penjual.detail-produk-penjual', compact('produk'), [
            'title' => 'Detail Produk',
            'active' => 'detail-produk',
            'spesifikasi' => $spesifikasi,
            'fotos' => $fotos
        ]);
    }

    // public function edit($id)
    // {
    //     // Tampilkan form untuk mengedit produk dengan ID tertentu
    //     $produk = Produk::findOrFail($id);
    //     return view('produk.edit', compact('produk'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         // Atur validasi sesuai kebutuhan
    //     ]);

    //     // Update produk yang sesuai dengan ID
    //     $produk = Produk::findOrFail($id);
    //     $produk->update($validatedData);

    //     return redirect()->route('crud-produk.index')->with('success', 'Produk berhasil diperbarui');
    // }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('/produk-penjual')->with('success', 'Produk berhasil dihapus');
    }
}


    