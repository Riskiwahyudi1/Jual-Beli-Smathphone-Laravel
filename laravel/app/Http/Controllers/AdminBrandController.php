<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBrandController extends Controller
{
    public function adminTransaksi(){
        return view('/admin/admin-brand',[
            'title' => 'TeraPhone| Admin Brand',
        
        ]);
    }
}
