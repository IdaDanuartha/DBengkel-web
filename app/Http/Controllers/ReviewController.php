<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $user_review = $request->input('user_review');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status', '1')->first();

        if ($product_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.product_id', $product_id)->get();

            if ($verified_purchase->count() > 0) {
                $existing_rating = Review::where('user_id', Auth::id())->where('product_id', $product_id)->first();

                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->user_review = $user_review;
                    $existing_rating->update();
                } else {
                    Review::create([
                        'user_id' => Auth::id(),
                        'product_id' => $product_id,
                        'stars_rated' => $stars_rated,
                        'user_review' => $user_review
                    ]);
                }
                return redirect()->back()->with('status', "Thank you for Review this product 🤩");
            } else {
                return redirect()->back()->with('status', "You cannot review a product before your order arrived");
            }
        } else {
            return redirect()->back()->with('status', "The link you folowed was broken");
        }
    }
}
