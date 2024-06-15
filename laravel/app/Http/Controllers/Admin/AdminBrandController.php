<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBrandController extends Controller
{
    public function adminbrand(){
        return view('admin.admin-brand',[
            'title' => 'TeraPhone| Admin Brand',
        
        ]);
    }
}
