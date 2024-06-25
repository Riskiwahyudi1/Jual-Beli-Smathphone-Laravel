<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function loginAdmin(){
        return view('admin.login-admin',[
            'title' => 'Login Admin',
        
        ]);
    }
}
