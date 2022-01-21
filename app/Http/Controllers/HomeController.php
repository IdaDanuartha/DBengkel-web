<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            "title" => "Home Page",
            "featured_prod" => Product::where('trending', '1')->take(15)->get(),
            "latest_prod" => Product::latest()->take(15)->get()
        ]);
    }

    public function allProducts()
    {
        return view('frontend.all-products', [
            "title" => "All Products",
            "products" => Product::latest()->filter(request(['search', 'category']))->paginate(3),
            "categories" => Category::all()
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
                $product = Product::where('slug', $prod_slug)->first();
                $title = $product->name;
                $countCart = Cart::all();
                return view('frontend.single-product', compact('product', 'title', 'countCart'));
            } else {
                return redirect('/')->with('status', 'The link was broken');
            }
        } else {
            return redirect('/')->with('status', 'No such category found');
        }
    }

    public function ajaxAutocomplete()
    {
        $products = Product::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($products as $product) {
            $data[] = $product['name'];
        }

        return $data;
    }
}
