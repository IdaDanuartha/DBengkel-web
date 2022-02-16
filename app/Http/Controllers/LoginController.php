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

            if (Auth::user()->role_as == '1' || Auth::user()->role_as == '2') {
                return redirect('/dashboard')->with('status', 'Welcome to Dashboard, ' . Auth::user()->first_name . ' ' . Auth::user()->last_name);
            } else if (Auth::user()->role_as == '0') {
                return redirect('/');
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
