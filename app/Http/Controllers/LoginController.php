<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function addregister(Request $request)
    {
        $register = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        $request['role'] = 2;

        if ($register) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 2,
                'password' => bcrypt($request->password),
            ]);
            return redirect('/')->with('register', 'Registration Success !');;
        } else {
            return redirect()->back()->with('pesan', 'Gagal');
        }
    }

    function auth(Request $request)
    {
        $validate = $request->validate([  
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect('/admin');
            } elseif ($user->role === 'User') {
                return redirect('/show');
            }
        }

        return redirect()->back()->with('pesan', 'Login gagal');
    }

    function forgot(){
        return view('forgot');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
