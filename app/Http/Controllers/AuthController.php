<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


public function login(Request $request)
{
    $credentials = $request->validate([
        'name' => 'required',
        'password' => 'required'
    ]);

    // Coba cari user berdasarkan nama
    $user = User::where('name', $credentials['name'])->first();

    // Cek apakah user ada dan passwordnya cocok
    if ($user && password_verify($credentials['password'], $user->password)) {
        Auth::login($user); // Login user

        // Cek role dan redirect ke halaman sesuai
        if ($user->role == 'admin') {
            return redirect('/beranda');
        } elseif ($user->role == 'kasir') {
            return redirect('/beranda');
        }
    }

    return back()->withErrors(['name' => 'Nama atau password salah.']);
}

}

