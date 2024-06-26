<?php

namespace App\Http\Controllers\Admin;

use App\Models\LayananPengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengaduanController extends Controller
{
    public function adminpengaduan(){
        $pesans = LayananPengguna::all();
        return view('admin.admin-pengaduan',[
            'title' => 'TeraPhone| Admin Pengaduan',
            'pesans' => $pesans,
        ]);
    }
}
