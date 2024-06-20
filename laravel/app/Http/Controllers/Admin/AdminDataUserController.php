<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDataUserController extends Controller
{
    public function adminDataUser(){
        return view('admin.admin-data-user',[
            'title' => 'TeraPhone| Admin Data User',
        
        ]);
    }
}

