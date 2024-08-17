<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    // Tampilkan form ganti password
    public function showChangePasswordForm()
    {
        return view('change-password', [
            'title' => 'Change Password'
        ]);
    }

    
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah!']);
        }

        // Update password baru
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);
        $role = Auth::user()->role;
        $message = 'Password berhasil diubah!';
        
        return back()->with('message', $message)->with('role', $role);
    }
}
