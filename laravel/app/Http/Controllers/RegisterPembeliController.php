<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterPembeliController extends Controller
{
    function index()
    {
        return view("register-pembeli");
    }
    
}

