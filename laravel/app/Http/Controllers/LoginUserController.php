<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
   // halaman login
   public function login() {
      
      return view('login.login-user', [
         "title" => "Login",
         
      ]);
   }
   // autentikasi login user 
   public function authenticate(Request $request)
    {
          $credentials = $request->only('email', 'password');
  
          if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->redirectBasedOnRole($user);
        }
  
          return redirect()->back()->withErrors(['email' => 'Email atau Password salah']);
      }
      protected function redirectBasedOnRole($user)
    {
        if ($user->isSeller()) {
            return redirect()->route('/home-penjual');
        } elseif ($user->isBuyer()) {
            return redirect()->route('/home');
        }

        return redirect('/');
    }
  
      public function logout(Request $request)
      {
          Auth::logout();
          return redirect('/home');
      }
}