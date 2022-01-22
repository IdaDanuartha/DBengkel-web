<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.customers-order.index', [
            "title" => "Customers Order",
            "orders" => Order::where('status', '<', '4')->get()
        ]);
    }

    public function orderHistory()
    {
        return view('dashboard.customers-order.history', [
            "title" => "Order History",
            "orders" => Order::where('status', '4')->get()
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

        return redirect('/dashboard/customers-order')->with('status', 'Status Updated Successfully');
    }
}
