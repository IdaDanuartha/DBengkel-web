<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.customers-order.index', [
            "title" => "Customer Orders",
            "orders" => Order::latest()->where('status', '<', '4')->paginate(10)
        ]);
    }

    public function orderHistory()
    {
        return view('dashboard.customers-order.history', [
            "title" => "Order History",
            "orders" => Order::latest()->where('status', '>', '3')->paginate(10)
        ]);
    }

    public function viewDetails($id)
    {
        return view('dashboard.customers-order.view-details', [
            "title" => "Details Order",
            "orders" => Order::where('id', $id)->first()
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('status');

        $orders->update();

        return redirect('/dashboard/customer-orders')->with('status', 'Status Updated Successfully');
    }
}
