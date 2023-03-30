<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmailMiddleware
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
    // Ambil email user dari request
    $email = $request->input('email');

    // Jika email tidak ada, kembalikan response dengan status 400 (Bad Request)
    if (!$email) {
        return response()->json(['message' => 'Email is required'], 400);
    }

    // Simpan email user pada session
    $request->session()->put('email', $email);

    return $next($request);
    }

}
