<?php

namespace App\Http\Controllers\penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananPenggunaPenjualController extends Controller
{
    public function layananPengguna(){
        return view('penjual.layanan-pengguna',[
            'title' => 'Layanan Pengguna'
        ]);
    }
}
