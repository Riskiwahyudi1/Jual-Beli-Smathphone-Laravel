<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\LayananPengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    public function homeAdmin(){
        $userPembeli = User::where("role", "buyer")->get();
        $userPenjual = User::where("role", "seller")->get();
        $produks = Produk::all();
        $transaksis = Transaksi::all();
        $brands = Produk::get()->pluck('brand');
        $layananpenggunas = LayananPengguna::all(); 
        $users = User::all();
        return view('admin.home-admin', [
            'title' => 'Home Admin',
            'totalUserPembeli' => $userPembeli,
            'totalUserPenjual' => $userPenjual,
            'produks' => $produks,
            'transaksis' => $transaksis,
            'brands' => $brands,
            'layananpenggunas' => $layananpenggunas,
            'users' => $users,
        ]);
        
    }
}
