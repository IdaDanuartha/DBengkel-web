<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // $old_product_cart = Cart::where('user_id', Auth::id())->get();

        // foreach ($old_product_cart as $item) {

        //     if (!Product::where('id', $item->product_id)->where('quantity', '>', $item->product_qty)->exists()) {
        //         $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
        //         $removeItem->delete();
        //     }
        // }

        $title = 'Checkout Page';
        $product_cart = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('title', 'product_cart'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();

        $order->user_id = Auth::id();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->no_telp = $request->input('no_telp');
        $order->address = $request->input('address');
        $order->country = $request->input('country');
        $order->province = $request->input('province');
        $order->city = $request->input('city');
        $order->pos_code = $request->input('pos_code');
        $order->message = $request->input('message');
        $order->address_type = $request->input('address_type');
        $order->tracking_no = $request->input('first_name') . rand(11111, 99999);

        // Calculate total price
        $product_tax = 0;
        $totalPrice = 0;
        $product_cart_total = Cart::where('user_id', Auth::id())->get();

        foreach ($product_cart_total as $item) {
            if ($item->products->disc_price) {
                $totalPrice += $item->products->disc_price * $item->product_qty;
                $product_tax += $item->products->disc_price * $item->product_qty;
            } else {
                $totalPrice += $item->products->ori_price * $item->product_qty;
                $product_tax += $item->products->ori_price * $item->product_qty;;
            }
        }

        $product_tax *= 10 / 100;

        $totalPrice += $product_tax + 20000;
        $order->total_price = $totalPrice;

        $order->save();

        $product_cart = Cart::where('user_id', Auth::id())->get();
        foreach ($product_cart as $item) {
            if ($item->products->disc_price) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->product_qty,
                    'price' => $item->products->disc_price
                ]);
            } else {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->product_qty,
                    'price' => $item->products->ori_price
                ]);

                $product = Product::where('id', $item->product_id)->first();
                $product->quantity = $product->quantity - $item->product_qty;
                $product->update();
            }
        }

        if (Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();

            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->no_telp = $request->input('no_telp');
            $user->address = $request->input('address');
            $user->country = $request->input('country');
            $user->province = $request->input('province');
            $user->city = $request->input('city');
            $user->pos_code = $request->input('pos_code');
            $user->message = $request->input('message');
            $user->address_type = $request->input('address_type');

            $user->update();
        }

        $product_cart = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($product_cart);

        return redirect('/my-orders')->with('status', 'Thank you for placing your order, we will contact you as soon as possible to confirm');
    }
}
