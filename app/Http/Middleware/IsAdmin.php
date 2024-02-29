<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();

        // Jika pengguna tidak terautentikasi atau rolenya tidak sesuai dengan yang diizinkan
        if (!$user || !in_array($user->role, $roles)) {
            return redirect()->route('admin.dashboard.index')->with('error', 'Akses Ditolak');
        }

        return $next($request);
    }
}
