<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\Cek_login;
// use App\Http\Controllers\mahasiswaController;


class AuthController extends Controller
{
    public function index(Request $request)
    {   
        // return view('auth.login');

        // dd($user = Auth::user());
            // dd($this->middleware('Cek_login::class'));
            $this->middleware('auth');
        if ($user = Auth::user()) {
            if ($user->level == '0') {
                return redirect()->intended('mahasiswa/index');
            } elseif($user->level =='1') {
                return redirect()->intended('admin/index');
            } elseif ($user->level == '2'){
                return redirect()->intended('mahasiswa2/index');
            }
        }else{
            return view('auth.login');
            }
            
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session()->put('user_id', $user->id);
        session()->put('user_level', $user->level);
        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');
                // dd(Auth::attempt($kredensil));
            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == '0') {
                    return redirect()->intended('mahasiswa/index');
                } elseif ($user->level == '1') {
                    return redirect()->intended('admin/index');
                }elseif ($user->level == '2'){
                    return redirect()->intended('mahasiswa2/index');
                }
                // return redirect()->intended('/');
            }else{
                return redirect('login')
                        ->withInput()
                        ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
                            }
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
