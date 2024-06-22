<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusOrderanController extends Controller
{
    public function statusOrderan(){
        return view('penjual.status-orderan',[
            'title' => 'Status Orderan Penjual',
            'active' => 'status-orderan',
        
        ]);
    }
}
