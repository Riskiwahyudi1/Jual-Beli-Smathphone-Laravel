<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkout extends Controller
{
    public function checkout(){
        return view('checkout');
    }
}
