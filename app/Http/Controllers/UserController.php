<?php

namespace App\Http\Controllers;

use App\Models\Order;
// use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.orders', [
            "title" => "My Orders",
            "orders" => Order::latest()->where('user_id', Auth::id())->where('status', '<', '4')->get()
        ]);
    }

    public function viewDetails($id)
    {
        return view('frontend.order-details', [
            "title" => "Order Details",
            "orders" => Order::where('id', $id)->where('user_id', Auth::id())->first()
        ]);
    }

    public function completeOrder($id)
    {
        $orders = Order::find($id);
        $orders->status = 4;

        $orders->update();

        return redirect('/my-orders')->with('status', 'Order Completed, we hope you like our products');
    }

    public function profileView()
    {
        return view('frontend.profile.index', [
            "title" => "My Profile"
        ]);
    }
}
