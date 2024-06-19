<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller
{
    public function homeAdmin(){
        return view('admin.home-admin', [
            'title' => 'Home Admin'
        ]);
        
    }
}
