<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananPenggunaController extends Controller
{
    public function layananPengguna(){
        return view('layanan-pengguna',[
            "title" => "Halaman Layanan"
        ]);
    }
}
