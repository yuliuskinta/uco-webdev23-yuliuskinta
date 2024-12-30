<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Authentication failed, please check your email and/or password',
        ])->onlyInput('email');
    }

    function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return back();
    }
}
