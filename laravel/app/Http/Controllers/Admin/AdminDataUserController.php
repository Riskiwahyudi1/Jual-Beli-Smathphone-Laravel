<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDataUserController extends Controller
{
    
    public function adminDataUser(){
        $filters = [
            'search' => request('search'),
            'role' => request('role'),
        ];
    
        $search = User::userFilter($filters)->where('role', '!=', 'admin')->paginate(20);
        return view('admin.admin-data-user',[
            'title' => 'Admin Data User',
            'active' => 'Admin Data User',
            'users' => $search,
        ]);
    }
}

