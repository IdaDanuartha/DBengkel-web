<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $product_id = $request->input(('product_id'));
        $product = Product::where('id', $product_id)->where('status', '1')->first();

        if ($product) {
            $user_review = $request->input('user_review');
            $create_review = Review::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'user_review' => $user_review
            ]);

            if ($create_review) {
                return redirect()->back()->with('status', 'Thank you for review this product 🤩');
            }
        } else {
            return redirect()->back()->with('status', 'The link you folowed was broken');
        }
    }

    public function updateReview(Request $request)
    {
        $user_review = $request->input('user_review');

        if ($user_review) {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();

            if ($review) {
                $review->user_review = $user_review;
                $review->update();

                return redirect()->back()->with('status', 'Review Updated Successfully');
            } else {
                return redirect()->back()->with('status', 'The link you followed was broken');
            }
        }
    }
}
