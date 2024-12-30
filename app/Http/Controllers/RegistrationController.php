<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    function index()
    {
        return view('registration.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'min:3', 'max:50'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ]);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->withSuccess('User has been created, please login to proceed');
    }
}
