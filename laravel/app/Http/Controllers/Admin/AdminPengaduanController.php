<?php

namespace App\Http\Controllers\Admin;

use App\Models\LayananPengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengaduanController extends Controller
{
    public function adminpengaduan(){
        $pesans = LayananPengguna::orderByRaw("FIELD(status, 'diproses') DESC")->paginate(20);
        return view('admin.admin-pengaduan',[
            'title' => 'Admin Pengaduan',
            'active' => 'Admin Pengaduan',
            'pesans' => $pesans,
        ]);
    }
    public function done(Request $request){

        $pesanIds = $request->input('pesan-id', []);
        
        foreach ($pesanIds as $pesanId) {
            
            $pesanId = LayananPengguna::findOrFail($pesanId); 
            $pesanId->status = 'Selesai'; 
            $pesanId->save(); 
        }
        return redirect()->back()->with('success', 'Perrmasalahan Selesai');
    
    }
}
