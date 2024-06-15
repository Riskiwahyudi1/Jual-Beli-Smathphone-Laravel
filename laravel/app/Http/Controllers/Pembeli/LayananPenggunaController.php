<?php

namespace App\Http\Controllers\Pembeli;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananPenggunaController extends Controller
{
    public function layananPengguna(){
        return view('pembeli.layanan-pengguna',[
            "title" => "Halaman Layanan"
        ]);
    }
}
