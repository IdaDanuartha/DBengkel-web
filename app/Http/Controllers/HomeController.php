<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            "title" => "Home Page",
            "featured_prod" => Product::with('category')->where('trending', '1')->take(12)->get(),
            "latest_prod" => Product::with('category')->latest()->take(12)->get()
        ]);
    }

    public function allProducts()
    {
        // $review = Review::all();
        // $product = Product::all();

        // $product_review = Product::where('review_id', $review->id)->where('product_id', $review->product_id)->first();
        // $rating_sum = Review::where('product_id', $product->id)->sum('stars_rated')->first();

        // if ($product_review->count() > 0) {
        //     $rating_value = $rating_sum / $review->count();
        // } else {
        //     $rating_value = 0;
        // }

        return view('frontend.all-products', [
            "title" => "All Products",
            "products" => Product::with('category')->latest()->filter(request(['search', 'category']))->paginate(20),
            "categories" => Category::all(),
        ]);
    }

    public function category()
    {
        return view('frontend.category', [
            "title" => "Category Page",
            "categories" => Category::all(),
            "popular_categories" => Category::where('popular', '1')->get()
        ]);
    }

    public function viewCategories($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $title = 'Products By Category';
            $category = Category::where('slug', $slug)->first();
            $categories = Category::all();
            $products = Product::where('category_id', $category->id)->get();
            $countCart = Cart::all();

            return view('frontend.all-products', compact('title', 'category', 'categories', 'products', 'countCart'));
        } else {
            return redirect('/category')->with('status', 'Slug does not exist');
        }
    }

    public function viewProduct($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {

            if (Product::where('slug', $prod_slug)->exists()) {
                $category = Category::where('slug', $cate_slug)->first();
                $related_products = Product::where('category_id', $category->id)->where('status', '1')->take(4)->get();

                $product = Product::where('slug', $prod_slug)->first();
                $ratings = Review::where('product_id', $product->id)->get();
                $rating_sum = Review::where('product_id', $product->id)->sum('stars_rated');
                // $user_rating = Review::where('product_id', $product->id)->where('user_id', Auth::id())->first();
                $user_review = Review::latest()->where('product_id', $product->id)->get();
                $review = Review::where('user_id', Auth::id())->where('product_id', $product->id)->first();

                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }

                $title = $product->name;
                $countCart = Cart::all();
                return view('frontend.single-product', compact('product', 'related_products', 'ratings', 'rating_value', 'user_review', 'review', 'title', 'countCart'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'No such category found');
        }
    }
}
