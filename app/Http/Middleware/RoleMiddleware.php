<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Jika belum login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        // Jika role tidak cocok
        if (Auth::user()->role !== $role) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        return $next($request);
    }
}
