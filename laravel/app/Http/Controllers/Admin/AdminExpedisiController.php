<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminExpedisiController extends Controller
{
    public function adminexpedisi(){
        return view('admin.admin-expedisi',[
            'title' => 'TeraPhone| Admin Expedisi',
        
        ]);
    }
}
