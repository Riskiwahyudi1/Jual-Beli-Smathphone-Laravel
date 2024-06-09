<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPembeliController extends Controller
{
    function index()
    {
        return view("login-pembeli");
    }
    
}

