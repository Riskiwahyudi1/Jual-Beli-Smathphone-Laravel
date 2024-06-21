<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProdukController extends Controller
{
    public function adminProduk(){
        return view('admin.admin-produk',[
            'title' => 'TeraPhone| Admin Produk',
        
        ]);
    }
}
