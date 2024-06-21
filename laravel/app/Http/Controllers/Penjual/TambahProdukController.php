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
    public function create()
    {
        // Tampilkan form untuk menambah produk baru
        return view('produk.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
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
            'foto.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi untuk multiple files
        ]);

        // Proses upload file foto
        $fotoPaths = [];
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $file) {
                $path = $file->store('public/images/foto_produk');
                $fotoPaths[] = $path;
            }
        }

        // Encode spesifikasi sebagai JSON
        $validatedData['spesifikasi'] = json_encode($validatedData['spesifikasi']);

        // Tambahkan user_id dari authenticated user
        $validatedData['user_id'] = auth()->id();

        // Tambahkan path foto ke dalam data yang akan disimpan di database
        $validatedData['foto'] = $fotoPaths;

        // Insert data ke database
        Produk::create($validatedData);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    // public function show($id)
    // {
    //     // Tampilkan detail produk dengan ID tertentu
    //     $produk = Produk::findOrFail($id);
    //     return view('produk.show', compact('produk'));
    // }

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

    // public function destroy($id)
    // {
    //     // Hapus produk dengan ID tertentu
    //     $produk = Produk::findOrFail($id);
    //     $produk->delete();

    //     return redirect()->route('crud-produk.index')->with('success', 'Produk berhasil dihapus');
    // }
}


    // $produk = new Produk();
    // $produk->nama = $validated['nama-produk'];
    // $produk->harga = $validated['harga-produk'];
    // $produk->kategori = $validated['kategori_id'];
    // $produk->deskripsi = $validated['deskripsi-produk'];
    // $produk->stok = $validated['stok-produk'];
    // $produk->diskon = $validated['diskon-produk'];
    // $produk->spesifikasi = json_encode($data);
    // $produk->foto = 'tes';