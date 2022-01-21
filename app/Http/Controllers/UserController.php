<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.orders', [
            "title" => "Orders Status",
            "orders" => Order::where('user_id', Auth::id())->get()
        ]);
    }

    public function viewDetails($id)
    {
        return view('frontend.order-details', [
            "title" => "Order Details",
            "orders" => Order::where('id', $id)->where('user_id', Auth::id())->first()
        ]);
    }
}
