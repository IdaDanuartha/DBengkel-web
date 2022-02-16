<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            "title" => "Categories",
            "categories" => Category::latest()->paginate(10),
        ]);
    }

    public function insert(Request $request)
    {
        $category = new Category();

        $validatedData = $request->validate([
            "name" => "required|max:191|unique:categories",
            "slug" => "required|unique:categories",
            "description" => "required",
            "main_image" => "required|image|file|max:2000",
        ]);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $fileName);
            $category->main_image = $fileName;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';

        $category->save($validatedData);

        return redirect('/dashboard/categories')->with('status', "New category has been added");
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return response()->json([
            'category' => $category
        ]);

        // return view('dashboard.categories.edit', [
        //     "title" => "Edit Category",
        //     "category" => $category
        // ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if ($request->hasFile('main_image')) {
            $path = 'assets/uploads/categories/' . $category->main_image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('main_image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $fileName);
            $category->main_image = $fileName;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';

        $category->update();

        return redirect('/dashboard/categories')->with('status', "Category has been updated");
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        // $path = 'assets/uploads/categories/' . $category->main_image;
        // if (File::exists($path)) {
        //     File::delete($path);
        // }
        $category->status = 0;

        $category->update();
        return redirect('/dashboard/categories')->with('status', "Category status has been deactived");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->categoryName);

        return response()->json(['slug' => $slug]);
    }
}
