<?php

namespace App\Http\Controllers\penjual;

use Illuminate\Http\Request;
use App\Models\LayananPengguna;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananPenggunaPenjualController extends Controller
{
    public function layananPenggunaPenjual(){
        return view('penjual.layanan-pengguna-penjual',[
            'title' => 'Layanan Pengguna Penjual',
            'active' => 'layanan-pengguna-penjual',
        ]);
    }
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'pengaduan' => 'required',
            'pesan' => 'required',
        ]);

        $validasiData['user_id'] = Auth::id();
        $validasiData['status'] = "diproses";

        LayananPengguna::create($validasiData);

        $request->session()->flash('berhasil', 'Terkirim, pengaduan anda akan di cek admin.');

        return redirect('/layanan-pengguna-penjual');
    }
}
