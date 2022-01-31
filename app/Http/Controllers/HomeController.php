<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function allProducts(Request $request)
    {
        // Filter product
        $filterProduct = $request->input('filter');
        $category = $request->input('category');
        $search = $request->input('search');


        if ($filterProduct == 'latest') {
            $products = DB::table('products')
                ->select('products.slug', 'products.status', 'products.main_image', 'products.name', 'products.disc_price', 'products.ori_price', 'categories.name AS category_name', 'categories.slug AS category_slug')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . $category . '%')
                ->where('products.name', 'LIKE', '%' . $search . '%')
                ->orderBy('products.created_at', 'DESC')
                ->paginate(20);
        } elseif ($filterProduct == 'popular') {
            $products = DB::table('products')
                ->select('products.slug', 'products.status', 'products.main_image', 'products.name', 'products.disc_price', 'products.ori_price', 'categories.name AS category_name', 'categories.slug AS category_slug')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . $category . '%')
                ->where('products.name', 'LIKE', '%' . $search . '%')
                ->orderBy('products.trending', 'DESC')
                ->paginate(20);
        } elseif ($filterProduct == 'lowest-price') {
            $products = DB::table('products')
                ->select('products.slug', 'products.status', 'products.main_image', 'products.name', 'products.disc_price', 'products.ori_price', 'categories.name AS category_name', 'categories.slug AS category_slug')
                ->addSelect(DB::raw('IF(disc_price IS NULL, ori_price, disc_price ) AS current_price'))
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . $category . '%')
                ->where('products.name', 'LIKE', '%' . $search . '%')
                ->orderBy('current_price', 'ASC')
                ->paginate(20);
        } elseif ($filterProduct == 'highest-price') {
            $products = DB::table('products')
                ->select('products.slug', 'products.status', 'products.main_image', 'products.name', 'products.disc_price', 'products.ori_price', 'categories.name AS category_name', 'categories.slug AS category_slug')
                ->addSelect(DB::raw('IF(disc_price IS NULL, ori_price, disc_price ) AS current_price'))
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . $category . '%')
                ->where('products.name', 'LIKE', '%' . $search . '%')
                ->orderBy('current_price', 'DESC')
                ->paginate(20);
        } else {
            $products = DB::table('products')
                ->select('products.slug', 'products.status', 'products.main_image', 'products.name', 'products.disc_price', 'products.ori_price', 'categories.name AS category_name', 'categories.slug AS category_slug')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'LIKE', '%' . $category . '%')
                ->where('products.name', 'LIKE', '%' . $search . '%')
                ->paginate(20);
        }

        return view('frontend.all-products', [
            "title" => "All Products",
            "products" => $products,
            "categories" => Category::where('status', '1')->get(),
            "filter" => $filterProduct
        ]);
    }

    public function category()
    {
        return view('frontend.category', [
            "title" => "Category Page",
            "categories" => Category::where('status', '1')->get(),
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
                $related_products = Product::inRandomOrder()->where('category_id', $category->id)->where('status', '1')->take(4)->get();

                $product = Product::where('slug', $prod_slug)->first();
                $productReview = Product::where('slug', $prod_slug)->first();

                $ratings = Review::where('product_id', $product->id)->get();
                $rating_sum = Review::where('product_id', $product->id)->sum('stars_rated');
                $user_review = Review::latest()->where('product_id', $product->id)->get();
                $review = Review::where('user_id', Auth::id())->where('product_id', $product->id)->first();

                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }

                $title = $product->name;
                $countCart = Cart::all();
                return view('frontend.single-product', compact('product', 'productReview', 'related_products', 'ratings', 'rating_value', 'user_review', 'review', 'title', 'countCart'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'No such category found');
        }
    }

    // public function autocomplete(Request $request)
    // {
    //     $data = Product::select("name")->where("name", "LIKE", "%{$request->value}%")->get();

    //     return response()->json($data);
    // }
}
