<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\absen;
use App\Models\mahasiswa;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        if (Auth::check() && Auth::user()->level == '0') {
            // dd('1');
            return $next($request);
        } elseif (Auth::check() && Auth::user()->level == '2') {
            // dd('2');
            return redirect()->route('mahasiswa2.index');
        } elseif (Auth::check() && Auth::user()->level == '1') {
            // dd('3');
            return $next($request);
        }else {
            // dd('4');
        return redirect()->route('login')->with('error', 'Anda tidak memiliki akses untuk halaman tersebut.');
        }
    }
}
