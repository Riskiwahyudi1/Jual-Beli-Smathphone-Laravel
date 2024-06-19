<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengaduanController extends Controller
{
    public function adminpengaduan(){
        return view('admin.admin-pengaduan',[
            'title' => 'TeraPhone| Admin Pengaduan',
        
        ]);
    }
}
