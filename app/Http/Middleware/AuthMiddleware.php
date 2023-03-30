<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $userId = session()->get('id');
    $userRole = session()->get('level');
    
    if ($userId && $userRole == '0') {
        // akses diberikan untuk admin
        return $next($request);
    } else {
        // akses ditolak
        return redirect('/login');
    }
}

}
