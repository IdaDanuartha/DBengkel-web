<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role_as == '1') {
                return redirect('/dashboard')->with('login-success', 'Welcome to Dashboard, Admin');
            } else if (Auth::user()->role_as == '0') {
                return redirect('/')->with('login-success', 'Logged in Succesfully');
            }
        }

        return back()->with('loginFailed', 'Login Failed! Maybe your Email or Password is wrong');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
