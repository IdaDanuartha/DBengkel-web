<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard Admin"
        ]);
    }

    public function usersView()
    {
        return view('dashboard.users.index', [
            "title" => "Users Registered",
            "users" => User::all()
        ]);
    }
}
