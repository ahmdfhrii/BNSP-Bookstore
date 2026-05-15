<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. FITUR LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Pengecekan Role Admin dan Customer
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau Password salah!')->withInput($request->only('email'));
    }

    // 2. FITUR REGISTRASI
    public function registerProcess(Request $request)
    {
        // Validasi input form register
        $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|string|max:20',
            'address'   => 'required|string',
            'dob'       => 'nullable|date',
            'gender'    => 'required|in:Laki-Laki,Perempuan',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        // Simpan data ke database
        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
            'dob'       => $request->dob,
            'gender'    => $request->gender,
            'password'  => Hash::make($request->password),
            'role'      => 'customer',
        ]);

        // Redirect ke halaman login setelah berhasil mendaftar
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // 3. FITUR LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus dan memperbarui sesi demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
