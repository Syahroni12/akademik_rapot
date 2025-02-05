<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KepsekMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Jika user bukan admin, arahkan ke dashboard umum
        if (Auth::user()->role !== 'kepsek') {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses sebagai kepsek');
        }

        // Jika user admin, lanjutkan request
        return $next($request);
    }
}
