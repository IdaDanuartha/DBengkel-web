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

    public function updateStatus(Request $request, $id)
    {
        $orders = Order::find($id);
        if ($orders->status == 3) {
            $orders->status = 4;
            $orders->update();

            return redirect('/my-orders')->with('status', 'Order Completed, we hope you like our products');
        } elseif ($orders->status == 0) {
            $orders->status = 5;
            $orders->update();
        }
        return redirect('/my-orders')->with('status', 'Order Canceled');
    }

    public function profileView()
    {
        return view('frontend.profile.index', [
            "title" => "My Profile",
            "userOrder" => Order::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function editProfile(Request $request, $id)
    {

        $user = User::find($id);

        $validatedData = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email:dns",
            "image" => "image|file|max:2000"
        ]);

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

        $user->no_telp = $request->input('no_telp');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->province = $request->input('province');
        $user->city = $request->input('city');
        $user->pos_code = $request->input('pos_code');
        $user->address_type = $request->input('address_type');

        $user->update($validatedData);

        return back()->with('status', 'Profile Updated Successfully');
    }
}
