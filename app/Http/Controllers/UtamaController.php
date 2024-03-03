<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UtamaController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            if ($role === 'admin') {
                $title = 'Dashboard Admin';
                return view('dashboard.index', compact('title'));
            } elseif (in_array($role, ['pemilik'])) {
                $title = 'Profil ' . ucfirst($role);

                if ($role === 'pemilik') {
                    $financialData = $user->financialData;
                    return view('profil.index', compact('title', 'financialData'));
                }
            }

            // Menolak akses jika peran tidak sesuai
            abort(403, 'Akses Ditolak');
        }

        // Arahkan pengguna ke rute login jika tidak terotentikasi
        return redirect()->route('login');
    }
}
