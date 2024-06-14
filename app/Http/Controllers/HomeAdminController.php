<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function homeAdmin(){
        return view('/admin/home-admin', [
            'title' => 'Home Admin'
        ]);
        
    }
}
