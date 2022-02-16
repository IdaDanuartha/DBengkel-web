<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index', [
            "title" => "Products",
            "products" => Product::latest()->with('category')->paginate(10),
            "categories" => Category::where('status', '1')->get()
        ]);
    }

    // public function create()
    // {
    //     return view('dashboard.products.create', [
    //         "title" => "Create new product",
    //         "categories" => Category::all()
    //     ]);
    // }

    public function insert(Request $request)
    {
        $products = new Product();

        $validatedData = $request->validate([
            "name" => "required|max:191",
            "slug" => "required|unique:products",
            "description" => "required",
            "ori_price" => "required",
            "quantity" => "required",
            "main_image" => "required|image|file|max:2000",
        ]);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $fileName);
            $products->main_image = $fileName;
        }

        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->category_id = $request->input('category_id');
        $products->description = $request->input('description');
        $products->ori_price = str_replace('.', '', $request->input('ori_price'));

        if ($products->disc_price) {
            $products->disc_price = str_replace('.', '', $request->input('disc_price'));
        }

        $products->quantity = str_replace('.', '', $request->input('quantity'));
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';

        $products->save($validatedData);

        return redirect('/dashboard/products')->with('status', "New Product has been added");
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return response()->json([
            'product' => $product,
            'categories' => Category::where('status', '1')->get()
        ]);
        // return view('dashboard.products.edit', [
        //     "title" => "Edit Product",
        //     "product" => $product,
        //     "categories" => Category::where('status', '1')->get()
        // ]);
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($request->hasFile('main_image')) {
            $path = 'assets/uploads/products/' . $products->main_image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $fileName);
            $products->main_image = $fileName;
        }

        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->category_id = $request->input('category_id');
        $products->description = $request->input('description');
        $products->ori_price = str_replace('.', '', $request->input('ori_price'));

        if ($request->input('disc_price')) {
            $products->disc_price = str_replace('.', '', $request->input('disc_price'));
        }

        $products->quantity = str_replace('.', '', $request->input('quantity'));
        // $products->tax = $request->input('tax');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';

        $products->update();

        return redirect('/dashboard/products')->with('status', "Product has been updated");
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        // $path = 'assets/uploads/products/' . $product->main_image;
        // if (File::exists($path)) {
        //     File::delete($path);
        // }

        $product->status = 0;

        $product->update();
        return redirect('/dashboard/products')->with('status', "Product has been deleted");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->productName);

        return response()->json(['slug' => $slug]);
    }
}
