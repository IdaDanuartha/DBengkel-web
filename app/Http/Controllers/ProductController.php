<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index', [
            "title" => "Products",
            "products" => Product::all(),
            "product" => new Product()
        ]);
    }

    public function create()
    {
        return view('dashboard.products.create', [
            "title" => "Create new product",
            "categories" => Category::all()
        ]);
    }

    public function insert(Request $request)
    {
        $products = new Product();

        $validatedData = $request->validate([
            "name" => "required|max:191",
            "slug" => "required|unique:products",
            "description" => "required",
            "ori_price" => "required",
            "quantity" => "required",
            // "tax" => "required",
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
        $products->ori_price = $request->input('ori_price');
        $products->disc_price = $request->input('disc_price');
        $products->quantity = $request->input('quantity');
        // $products->tax = $request->input('tax');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';

        $products->save($validatedData);

        return redirect('/dashboard/products')->with('status', "New Product has been added");
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('dashboard.products.edit', [
            "title" => "Edit Product",
            "product" => $product,
            "categories" => Category::all()
        ]);
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
        $products->ori_price = $request->input('ori_price');
        $products->disc_price = $request->input('disc_price');
        $products->quantity = $request->input('quantity');
        // $products->tax = $request->input('tax');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';

        $products->update();

        return redirect('/dashboard/products')->with('status', "Product has been updated");
    }

    public function destroy($id)
    {
        $products = Product::find($id);

        $path = 'assets/uploads/products/' . $products->main_image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $products->delete();
        return redirect('/dashboard/products')->with('status', "Product has been deleted");
    }
}
