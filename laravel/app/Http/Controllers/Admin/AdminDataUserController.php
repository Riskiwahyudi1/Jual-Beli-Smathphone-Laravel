<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDataUserController extends Controller
{
    public function AdminDataUser(){
        return view('/admin/admin-data-user',[
            'title' => 'TeraPhone| Admin Data User',
        
        ]);
    }
}

