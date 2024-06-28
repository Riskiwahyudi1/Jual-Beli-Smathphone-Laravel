<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDataUserController extends Controller
{
    public function adminDataUser(){
        $users = User::latest()->where('role', 'buyer')->orWhere('role', 'seller')->get();
        return view('admin.admin-data-user',[
            'title' => 'Admin Data User',
            'active' => 'Admin Data User',
            'users' => $users,
        ]);
    }
}

