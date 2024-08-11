<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\RajaOngkirService;
use Illuminate\Support\Facades\Auth;

class UserProfilController extends Controller
{
    protected $rajaOngkirService;
    
    public function __construct(RajaOngkirService $rajaOngkirService)
    {
        $this->rajaOngkirService = $rajaOngkirService;
    }
    public function userProfil() {
        // Mengambil user yang sedang login
        $auth = Auth::user();
        $authId = $auth->id;
    
        // Memanggil service RajaOngkir
        $rajaOngkirService = new RajaOngkirService(); 
        $provinces = $rajaOngkirService->getProvinces();
        $kotaKota = $rajaOngkirService->getKota();
    
        // Mengambil data rekening user
        $User = User::find($authId);
        $rekening = json_decode($User->rekening, true); 
        $detailAlamat = json_decode($User->alamat, true);
    
        return view('user-profil', [
            "title" => "Profil User",
            "informasiAkun" => $auth,
            'provinces' => $provinces, 
            'kotaKota' => $kotaKota, 
            'rekening' => $rekening ?? [],
            'detailAlamat' => $detailAlamat
        ]);
    }
    // edit data user

    public function editProfil(Request $request){

        $validatedData = $request->validate([
            'edit_nama_lengkap' => 'required|string|max:255',
            'edit_detail_alamat' => 'required|string|max:255',
            'edit_provinsi' => 'required|string|max:255',
            'edit_kota' => 'required|string|max:255',
            'edit_no_hp' => 'required|string|max:255',
            'edit_kode_pos' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        

        $user->name = $validatedData['edit_nama_lengkap'];
        $user->no_hp = $validatedData['edit_no_hp'];
        $user->alamat = [
            'nama' => $validatedData['edit_nama_lengkap'],
            'detail_alamat' => $validatedData['edit_detail_alamat'],
            'kota' => $validatedData['edit_kota'],
            'provinsi' => $validatedData['edit_provinsi'],
            'no_hp' => $validatedData['edit_no_hp'],
            'kode_pos' => $validatedData['edit_kode_pos'],
        ];
        $user->save();

        return redirect()->back()->with('success-edit-profil', 'Profil berhasil diperbaharui.');
    }

    // Menambahkan no rekening untuk penjual

    public function tambahRekening(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'no_rekening' => 'required|string|max:20' 
        ]);

        $user = auth()->user();
        $existingRekening = json_decode($user->rekening, true);

        if (!is_array($existingRekening)) {
            $existingRekening = [];
        }

        $existingRekening[] = $validatedData;
        $user->rekening = json_encode($existingRekening);
        $user->save();

        return redirect()->back()->with('success-tambah-rekening', 'Rekening berhasil ditambahkan.');
    }
    public function editRekening(Request $request)
    {
        $validatedData = $request->validate([
            'edit_nama_bank' => 'required|string|max:255',
            'edit_nama_pemilik' => 'required|string|max:255',
            'edit_no_rekening' => 'required|string|max:20',
            'index' => 'required|integer',
        ]);

        $user = auth()->user();
        $existingRekening = json_decode($user->rekening, true);
        $index = $validatedData['index'];

        $existingRekening[$index] = [
            'nama_bank' => $validatedData['edit_nama_bank'],
            'nama_pemilik' => $validatedData['edit_nama_pemilik'],
            'no_rekening' => $validatedData['edit_no_rekening']
        ];

        $user->rekening = json_encode($existingRekening);
        $user->save();

        return redirect()->back()->with('success-edit-rekening', 'Rekening berhasil diubah.');
    }
    public function deleteRekening(Request $request)
    {
        $validatedData = $request->validate([
            'index' => 'required|integer',
        ]);

        $user = auth()->user();
        $existingRekening = json_decode($user->rekening, true);

        $index = $validatedData['index'];
        
        unset($existingRekening[$index]);

        $existingRekening = array_values($existingRekening);

        $user->rekening = json_encode($existingRekening);
        $user->save();

        return redirect()->back()->with('success-delete-rekening', 'Rekening berhasil dihapus.');
    }



    



}
