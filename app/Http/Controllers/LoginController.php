<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login');
    }

    public function loginCheck(Request $request) 
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd('berhasil');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->level == 'user') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
            elseif($user->level == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/my');
            }
            else {
                return redirect()->intended('/login');
            }
        }

        return back()->with('gagalLogin', 'Akun yang anda masukkan salah');
    }

    public function logout(Request $request) 
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
