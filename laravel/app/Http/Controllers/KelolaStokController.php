<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaStokController extends Controller
{
    public function kelolaStok(){
        return view('/penjual/kelola-stok',[
            'title' => 'Kelolastok',
        
        ]);
    }
}
