<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolaStokController extends Controller
{
    public function kelolaStok(){
        return view('penjual.kelola-stok',[
            'title' => 'Kelola Stok Produk',
            'active' => 'kelola-stok',
        ]);
    }
}
