<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class keranjangController extends Controller
{
    public function keranjang(){

        return view('keranjang', [
         'title' => "Keranjang"
        ]);
    }
}
