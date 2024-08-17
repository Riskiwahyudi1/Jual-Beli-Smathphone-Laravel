<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\RajaOngkirService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // raja ongkir service
    protected $rajaOngkirService;

    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }

public function getProduk(Request $request)
{
    $productIds = $request->input('check-produk', []);
    $jumlah = $request->input('jumlah', []);
    $action = $request->input('action');

    $auth = Auth::id();
    $User = User::find($auth);
    $detailAlamat = json_decode($User->alamat, true);

    $rajaOngkirService = new RajaOngkirService(); 
    
    $provinceId = $request->input('provinsi'); 
    $provinces = $rajaOngkirService->getProvinces();
    $kotaKota = $rajaOngkirService->getKota();


    $action = 'checkout';
    if ($action == 'checkout') {
        if (!empty($productIds)) {
            $products = Produk::with('user')->whereIn('id', $productIds)->get();
        } else {
            $products = collect();
        }
        $jumlahProduk = [];
        foreach ($productIds as $productId) {

            // mencari indeks dari productId dalam array productIds
            $index = array_search($productId, $request->input('check-produk'));
            if ($index !== false && isset($jumlah[$index])) {
                $jumlahProduk[$productId] = $jumlah[$index];
            } else {
                $jumlahProduk[$productId] = 1; 
            }
        }
    }
    

    return view('pembeli.checkout', [
        'products' => $products,
        'action' => $action,
        'jumlah' => $jumlahProduk,
        'provinces' => $provinces, 
        'kotaKota' => $kotaKota, 
        'title' => 'Checkout',
        "dataUser" => $User,
        'detailAlamat' => $detailAlamat
    ]);
}

    public function konfirmasiCheckout(Request $request){
        // mengambil data dari request alamat pembeli
        $namaDepan = $request->input('nama-depan');
        $alamat = $request->input('alamat');
        $kota = $request->input('kota');
        $provinsi = $request->input('provinsi');
        $kodePos = $request->input('kode-pos');
        $noHp = $request->input('no-hp');
        
        $data = [
            'nama_depan' => $namaDepan,
            'alamat' => $alamat,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'kode_pos' => $kodePos,
            'no_hp' => $noHp,
        ];
    
        // Mengambil data dari request produk
        $produkIds = $request->input('produk');
        $jumlahProduks = $request->input('checkout-jumlah-produk');
        $penjual = $request->input('penjual');
        $status = $request->input('status');
        $ongkir = $request->input('ongkir');
        $totalTransaksi = $request->input('total-transaksi');
        $expedisi = $request->input('expedisi');
        $userId = auth()->id(); 
    
        foreach($produkIds as $index => $productId) {
    
            Transaksi::create([
                'user_id' => $userId,
                'produk_id' => $productId,
                'jumlah' => $jumlahProduks[$index],
                'penjual' => $penjual[$index],
                'status' => $status[$index],
                'ongkir' => $ongkir[$index],
                'total_transaksi' => $totalTransaksi,
                'expedisi' => $expedisi,
                'alamat' => json_encode($data)
            ]);
    
            // update terjual dan stok
            $produk = Produk::findOrFail($productId);
            $produk->terjual = $produk->terjual + $jumlahProduks[$index];
            $produk->stok = $produk->stok - $jumlahProduks[$index]; // Asumsi ada kolom stok
            $produk->save();

            Keranjang::where('user_id', $userId)->where('produk_id', $productId)->delete();
        
        }
    
        $request->session()->flash('berhasil', 'Berhasil checkout, Silahkan lakukan pembayaran!!');
    
        return redirect('/riwayat-transaksi?status=menunggu-pembayaran');
    }
    

    public function checkoutDariDetail(Request $request){


        return view('/checkout');
    }

    
}
