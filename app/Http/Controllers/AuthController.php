<?php

namespace App\Http\Controllers;

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

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended($this->redirectPath());
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password harus diisi',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return $this->redirectToRole()->with('success', 'Login berhasil');
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'Email atau Password salah']);
            }
        }
    }
}
