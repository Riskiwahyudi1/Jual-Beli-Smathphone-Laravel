<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function loginAdmin(){
        return view('admin.login-admin',[
            'title' => 'Login Admin',
        
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->isAdmin()) {
            return redirect()->route('home.admin');
        }

        return redirect()->back()->withErrors(['email' => 'Username/Password salah']);
    }

        public function logout(Request $request)
        {
            Auth::logout();
            return redirect('/login-admin');
        }
}
