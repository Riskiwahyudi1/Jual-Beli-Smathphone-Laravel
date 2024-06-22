<?php

namespace App\Http\Controllers\penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananPenggunaPenjualController extends Controller
{
    public function layananPenggunaPenjual(){
        return view('penjual.layanan-pengguna-penjual',[
            'title' => 'Layanan Pengguna Penjual',
            'active' => 'layanan-pengguna-penjual',
        ]);
    }
}
