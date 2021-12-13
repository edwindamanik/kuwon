<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register');
    }

    public function store(Request $request) 
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birth' => 'required|date',
            'phone' => 'required|unique:users',
            'education' => 'required',
            'level' => 'required',
            'username' => 'required|min:5|max:200|unique:users',
            'password' => 'required',
            'photo' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('successRegister', 'Anda berhasil mendaftar, silahkan login');
    }
}
