<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterPenjualController extends Controller
{
    public function index() {
      
        return view('register.register-penjual', [
           "title" => "Register Penjual",
          
        ]);
     }
    public function store(request $request) {
      
      $validasiData = $request->validate([
         'username' => 'required|min:4|max:255|unique:users|regex:/^\S*$/',
         'email' => 'required|email:dns|unique:users',
         'password' => 'required|min:6|max:255',
         'confirmasi-password' => 'required|min:6|max:255|same:password', 
     ], [
         'confirmasi-password.same' => 'Password dan konfirmasi password tidak cocok!!', 
     ]);

      User::create($validasiData);

      $request->session()->flash('berhasil', 'Berhasil registrasi.');

      return redirect('/login-pembeli');
     }
}
