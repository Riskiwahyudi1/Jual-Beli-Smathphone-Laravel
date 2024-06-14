<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePenjualController extends Controller
{
    public function homePenjual(){
        return view('/penjual/home-penjual', [
            'title' => 'Home Penjual'
        ]);
        
    }
}
