<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    // Proses login dan respons JSON untuk AJAX request
    public function postlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'redirect' => url('/')
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Login Gagal'
        ]);
    }

    // Method untuk menampilkan form register
    public function register()
    {
        return redirect()->action([RegistrationController::class, 'registration']);
    }

    // Proses register user baru (jika mau ditangani di sini juga, sesuaikan dengan RegistrationController)
    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => 2 // Default level jika diperlukan
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Register Berhasil',
            'redirect' => url('/login')
        ]);
    }

    // Proses logout dan invalidasi sesi
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}


