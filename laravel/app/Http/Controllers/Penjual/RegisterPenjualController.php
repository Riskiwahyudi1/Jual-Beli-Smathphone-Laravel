<?php

namespace App\Http\Controllers\penjual;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterPenjualController extends Controller
{
    public function index() {
      
        return view('register.register-penjual', [
           "title" => "Register Pembeli",
          
        ]);
     }
    public function store(request $request) {
      
      $validasiData = $request->validate([
         'username' => 'required|min:4|max:255|unique:users|regex:/^\S*$/',
         'email' => 'required|email:dns|unique:users',
         'password' => 'required|min:6|max:255',
         'confirmasi-password' => 'required|same:password', 
     ], [
         'confirmasi-password.same' => 'Password dan konfirmasi password tidak cocok!!', 
     ]);
     $validasiData['role'] = "seller";

     $user = User::create($validasiData);

    // Otomatis login pengguna
    Auth::login($user);
    

    $request->session()->flash('berhasil', 'Berhasil registrasi!. Silakan periksa email Anda untuk verifikasi.');
    event(new Registered($user));

    Log::info('User registered and logged in: ' . $user->email);

    return redirect('/email/verify');
    }
    
     // Verifikasi email
     public function verify(EmailVerificationRequest $request): RedirectResponse
     {
         Log::info('Verify method called');
         $user = $request->user();
         $user->fulfill();
 
         return redirect('/home-penjual');
     }
 
     public function resend(Request $request): RedirectResponse
     {
         if ($request->user()->hasVerifiedEmail()) {
             return redirect('/home-penjual');
         }
 
         $request->user()->sendEmailVerificationNotification();
 
         return back()->with('message', 'Verification link sent!');
     }
}

