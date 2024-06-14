<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusOrderanController extends Controller
{
    public function statusOrderan(){
        return view('/penjual/status-orderan',[
            'title' => 'TeraPhone | Status Orderan',
        
        ]);
    }
}
