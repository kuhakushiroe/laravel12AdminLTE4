<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna memiliki peran yang sesuai
        if (!auth()->check() || auth()->user()->role !== $role) {
            // Jika tidak, arahkan ke halaman 'home' atau ke halaman lainnya yang sesuai
            return redirect()->route('home');
        }

        return $next($request);
    }
}
