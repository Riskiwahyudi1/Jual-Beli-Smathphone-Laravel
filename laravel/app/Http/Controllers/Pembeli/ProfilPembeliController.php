<?php

namespace App\Http\Controllers\Pembeli;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RajaOngkirService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilPembeliController extends Controller
{
    protected $rajaOngkirService;
    
    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }
    public function profilPembeli() {
        
        // raja ongkir service
        $auth = Auth::user();
        $rajaOngkirService = new RajaOngkirService(); 
    
        $provinces = $rajaOngkirService->getProvinces();
        $kotaKota = $rajaOngkirService->getKota();
        
        return view('pembeli.profil', [
            "title" => "Profil User",
            "informasiAkun" => $auth,
            'provinces' => $provinces, 
            'kotaKota' => $kotaKota, 
        ]);
    }
}
