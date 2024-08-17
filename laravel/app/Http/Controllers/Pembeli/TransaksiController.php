<?php

namespace App\Http\Controllers\Pembeli;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
        // fungsi menampilkan transaksi
        public function riwayatTransaksi()
        {
            $userId = Auth::id();
            $filters = [
                'status' => request('status'),
            ];
    
            // Mengambil daftar penjual yang unik dari transaksi
            $penjualList = Transaksi::distinct()->pluck('penjual');
            $produkTransaksi = [];
            $jumlahTransaksi = 0;
            
            
            foreach ($penjualList as $penjual) {
                $transaksiList = Transaksi::transaksiFilter($filters)
                ->select('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'total_transaksi', 'expedisi', 'id', 'status','bukti_pembayaran', 'alamat')
                ->where('user_id', $userId)
                ->where('penjual', $penjual)
                ->groupBy('user_id', 'penjual', 'created_at', 'produk_id', 'jumlah', 'ongkir', 'total_transaksi', 'expedisi', 'id', 'status', 'bukti_pembayaran', 'alamat')
                ->latest()
                ->get()
                ->groupBy('created_at'); 
                
                if ($transaksiList->isNotEmpty()) {
                    $produkTransaksi[$penjual] = $transaksiList;
                    $jumlahTransaksi = 0;
                }
                
                if (count($produkTransaksi) > 0){
                    foreach ($produkTransaksi as $penjual => $transaksiListByTime) {
                        foreach ($transaksiListByTime as $createdAt => $transaksiList) {
                            if ($transaksiList->first()->status !== 'selesai' && $transaksiList->first()->status !== 'Dibatalkan') {
                                $jumlahTransaksi++;
                            }
                        }
                    }
                }
            }
    
            // tanda alert dalam riwayat transaksi
            $transaksis = Transaksi::where('user_id', $userId)->get();
            $statusCounts = [
                'menunggu-pembayaran' => $transaksis->where('status', 'menunggu-pembayaran')->count(),
                'dikemas' => $transaksis->where('status', 'dikemas')->count(),
                'dikirim' => $transaksis->where('status', 'dikirim')->count(),
            ];
            
            return [
                'produkTransaksi' => $produkTransaksi,
                'statusCounts' => $statusCounts,
                'jumlahTransaksi' => $jumlahTransaksi
            ];
        }
    
        public function tampilkanRiwayatTransaksi(Request $request)
        {
            $data = $this->riwayatTransaksi();

            $userId = $request->input('user_id');

            // $auth = Auth::user();
            // $authId = $auth->id;
            // $User = User::find($authId);
            // $rekening = json_decode($User->rekening, true); 
            // foreach ($rekening as $key => $rek) {
            // }
    
            return view('pembeli.riwayat-transaksi', [
                // dd($userId),
                // dd($request->all()),
                'title' => 'Riwayat Transaksi',
                'status' => ['menunggu-pembayaran', 'dikemas', 'dikirim', 'selesai', 'dibatalkan'],
                'transaksis' => $data['produkTransaksi'],
                'statusCounts' => $data['statusCounts'],
            ]);
        }
    

        // fungsi batalkan transaksi
    public function batalkanTransaksi(Request $request){
        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->produk->stok = $transaksi->produk->stok + $transaksi->jumlah ;
            $transaksi->produk->terjual = $transaksi->produk->terjual - $transaksi->jumlah ;
            $transaksi->status = 'Dibatalkan'; 
            $transaksi->save(); 
            $transaksi->produk->save(); 
        }
        return redirect()->back()->with('pembatalan-sukses', 'Transaksi dibatalkan ');
    }
    // fungsi konfirmasi penerimaan transaksi
    public function terimaTransaksi(Request $request){
        $transaksiIds = $request->input('transaksi', []);
        
        foreach ($transaksiIds as $transaksiId) {
            $transaksi = Transaksi::findOrFail($transaksiId); 
            $transaksi->status = 'selesai'; 
            $transaksi->save(); 
        }
        return redirect()->back()->with('produk-diterima-sukses', 'Transaksi Selesai');
    }
    
    // fungsi upload bukti transaksi
    public function pembayaran(Request $request)
    {
        $validasiData = $request->validate([
            'bukti-transaksi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'transaksi-id.*' => 'required|integer|exists:transaksis,id',
        ]);
        

        $buktiTransaksiFiles = $validasiData['bukti-transaksi'];
        $transaksiIds = $validasiData['transaksi-id'] ?? [];
        

        if ($request->hasFile('bukti-transaksi',[])) {
                $path = $buktiTransaksiFiles->store('public/images/bukti_pembayaran');
                $buktiTransaksiFiles = str_replace('public/', 'storage/', $path);
        } 

        foreach ($transaksiIds as $index => $transaksiId) {
            
            $transaksi = Transaksi::findOrFail($transaksiId);
            $transaksi->bukti_pembayaran = $buktiTransaksiFiles;
            $transaksi->save();
        }

        return back()->with('bukti-pembayaran-success', 'Berhasil dikirim, tunggu verifikasi penjual!');
    }
    
}