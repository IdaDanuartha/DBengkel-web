<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cartView()
    {
        return view('frontend.carts', [
            "title" => "My Carts",
            "cartItems" => Cart::where('user_id', Auth::id())->get()
        ]);
    }

    public function cartCount()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartCount]);
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check) {

                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $product_check->name . " Already Added to Cart"]);
                } else {
                    $cartItem = new Cart();
                    if ($product_quantity <= $product_check->quantity) {

                        $cartItem->product_id = $product_id;
                        $cartItem->user_id = Auth::id();
                        $cartItem->product_qty = $product_quantity;
                        $cartItem->save();

                        return response()->json(['status' => $product_check->name . " Added to Cart"]);
                    } else {
                        return response()->json(['status' => "The product has only " . $product_check->quantity . " items left"]);
                    }
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_qty');

        if (Auth::check()) {

            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $product_quantity;
                $cart->update();

                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product deleted from your cart"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
