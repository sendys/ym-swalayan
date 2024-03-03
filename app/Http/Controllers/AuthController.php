<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'Sign In YM-Swalayan',
        ]);
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validasi input email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        // Cari pengguna berdasarkan alamat email
        $user = User::where('email', $request->email)->first();

        // Jika pengguna ditemukan dan otentikasi berhasil
        if ($user && Auth::attempt($request->only('email', 'password'))) {
            // Buat token Sanctum untuk pengguna
            $token = $user->createToken('token-name')->plainTextToken;

            // Redirect pengguna sesuai peran mereka setelah login
            return $this->redirectToRole()->with('success', 'Login berhasil')->with('token', $token);
        } else {
            // Jika otentikasi gagal, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->withErrors(['email' => 'Email atau Password salah']);
        }
    }


    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        // Hapus semua token Sanctum untuk pengguna saat logout
        $request->user()->tokens()->delete();

        Auth::guard('web')->logout(); // Gunakan metode logout() dari Auth facade dengan guard 'web'

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil');
    }

    /**
     * Redirect to appropriate dashboard based on user role.
     */
    protected function redirectToRole()
    {
        // Ambil peran pengguna setelah login
        $role = Auth::user()->role;

        // Redirect sesuai peran pengguna
        if ($role == 'admin') {
            return redirect()->intended(route('admin.dashboard.index'));
        } elseif ($role == 'pemilik') {
            return redirect()->intended(route('admin.dashboard.index'));
        }
    }

    protected function redirectPath()
    {
        return '/admin';
    }
}
