<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!auth()->check()) {
            
            // Jika belum login, redirect ke halaman login
            return redirect()->route('login');
        }

        // 2. Cek apakah role pengguna adalah 'admin'
        if (auth()->user()->role !== 'admin') {
            
            // Jika role bukan 'admin', hentikan request dan tampilkan error 403 (Forbidden)
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // 3. Jika lolos kedua pengecekan, lanjutkan request ke tujuan
        return $next($request);
    }
}