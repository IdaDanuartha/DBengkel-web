<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            "title" => "My Profile",
            "userOrder" => Order::where('email', Auth::user()->email)->where('status', '4')->get()
        ]);
    }

    public function editProfile(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/users/' . $user->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/users/', $fileName);
            $user->image = $fileName;
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->no_telp = $request->input('no_telp');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->province = $request->input('province');
        $user->city = $request->input('city');
        $user->pos_code = $request->input('pos_code');
        $user->address_type = $request->input('address_type');

        $user->update();

        return back()->with('status', 'Profile Updated Successfully');
    }
}
