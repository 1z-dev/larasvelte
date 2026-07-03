<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function showLogin()
    {
        return Inertia::render('login');
    }

    public function storeLogin(Request $request)
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'Sorry, those credentials do not match.',
            ]);
        }

        request()->session()->regenerate();


        return redirect('/afspraken');
    }

    public function showRegister()
    {
        return Inertia::render('register');
    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'admin' => 'required|in:0,1',
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'admin' => $validated['admin'],
        ]);

        return redirect('/login');
    }


    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

}