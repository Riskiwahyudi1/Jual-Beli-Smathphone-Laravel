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
        ];
    
        $search = User::latest()->userFilter($filters)->where('role', 'buyer')->orWhere('role', 'seller')->paginate(20);
        return view('admin.admin-data-user',[
            'title' => 'Admin Data User',
            'active' => 'Admin Data User',
            'users' => $search,
        ]);
    }
}

