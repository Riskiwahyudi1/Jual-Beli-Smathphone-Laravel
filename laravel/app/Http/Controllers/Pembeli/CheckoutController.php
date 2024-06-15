<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout(){

        return view('pembeli.checkout',[
            'title' => 'Checkout',
            'active' => 'checkout',
            'kategoris' => Kategori::all(),
        ]);
    }
    public function getProduk(Request $request){
        $productIds = $request->input('check-produk', []);
        $jumlah = $request->input('jumlah', []);
        $action = $request->input('action');

        $action = 'checkout';
        if ($action == 'checkout') {
            if (!empty($productIds)) {
                $products = Produk::with('user')->whereIn('id', $productIds)->get();
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
        }
        return view('pembeli.checkout', [
            'products' => $products,
            'action' => $action,
            'jumlah' => $jumlahProduk,
            'title' => 'Checkout'
        ]);  
    }
    public function konfirmasiCheckout(Request $request){
        // Ambil data dari request alamat pembeli
        $namaDepan = $request->input('nama-depan');
        $namaBelakang = $request->input('nama-belakang');
        $alamat = $request->input('alamat');
        $kota = $request->input('kota');
        $provinsi = $request->input('provinsi');
        $kodePos = $request->input('kode-pos');
        $noHp = $request->input('no-hp');
        
        $data = [
            'nama_depan' => $namaDepan,
            'nama_belakang' => $namaBelakang,
            'alamat' => $alamat,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'kode_pos' => $kodePos,
            'no_hp' => $noHp,
        ];


        // Ambil data dari request produk
        $produkIds = $request->input('produk');
        $jumlahProduks = $request->input('checkout-jumlah-produk');
        $penjual = $request->input('penjual');
        $status = $request->input('status');
        $ongkir = $request->input('ongkir');
    
        $userId = auth()->id(); 
    
        // Loop melalui produkIds dan jumlahProduks untuk membuat entri transaksi
        foreach($produkIds as $index => $productId) {

    
            // Simpan data transaksi ke database
            Transaksi::create([
                'user_id' => $userId,
                'produk_id' => $productId,
                'jumlah' => $jumlahProduks[$index],
                'penjual' => $penjual[$index],
                'status' => $status[$index],
                'ongkir' => $ongkir[$index],
                'alamat' => json_encode($data)
                // Tambahkan kolom lain yang diperlukan
            ]);
        }
    
        // Redirect kembali dengan pesan sukses
        $request->session()->flash('berhasil', 'Berhasil checkout, Silahkan lakukan pembayaran!!');

        return redirect('/riwayat-transaksi?status=menunggu-pembayaran');
    }
    // fungsi untuk checkout langsung dari detail peroduk

    public function checkoutDariDetail(Request $request){


        return view('/checkout');
    }

    
}
