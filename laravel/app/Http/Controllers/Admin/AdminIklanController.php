<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIklanController extends Controller
{
    public function adminiklan(){
        return view('admin.admin-iklan',[
            'title' => 'TeraPhone| Admin Iklan',
        
        ]);
    }
}
