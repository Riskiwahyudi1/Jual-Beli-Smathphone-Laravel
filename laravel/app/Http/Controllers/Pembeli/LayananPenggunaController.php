<?php

namespace App\Http\Controllers\Pembeli;


use Illuminate\Http\Request;
use App\Models\LayananPengguna;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananPenggunaController extends Controller
{
    public function layananPengguna()
    {
        return view('pembeli.layanan-pengguna', [
            "title" => "Layanan Pengguna"
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

        return redirect()->back()->with('berhasil', 'Terkirim, pengaduan anda akan di cek admin.');

    }
}
