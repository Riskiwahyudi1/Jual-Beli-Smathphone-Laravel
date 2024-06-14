<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPenjualController extends Controller
{
   // get halaman login
   public function login() {
      
      return view('login.login-penjual', [
         "title" => "Login",
         
      ]);
   }
   // autentikasi login user 
   public function authenticate(request $request) {
     
      $credentials = $request->validate([
                     'email' => 'required|email:dns',
                     'password' => 'required'
                  ]);
      // auttentikasi session
      if(Auth::attempt($credentials)){
         $request->session()->regenerate();
         return redirect()->intended('/home');
      } 
      // cek apakah email sesuai dengan yg di database
      if (!User::where('email', $credentials['email'])->exists()) {
         return back()->withErrors([
             'failed' => 'Email belum terdaftar!',
         ]);
     }

   //   jika auttentikasi gagal
      return back()->with('LoginError', 'Email/Password salah!!');
                          
       }
       public function logout()
   {
    Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect('/home');
}
}