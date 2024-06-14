<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminExpedisiController extends Controller
{
    public function adminexpedisi(){
        return view('/admin/admin-expedisi',[
            'title' => 'TeraPhone| Admin Expedisi',
        
        ]);
    }
}
