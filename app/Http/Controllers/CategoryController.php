<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            "title" => "Category",
            "categories" => Category::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            "title" => "Create Category",
        ]);
    }

    public function insert(Request $request)
    {
        $category = new Category();

        $validatedData = $request->validate([
            "name" => "required|max:191",
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

        return view('dashboard.categories.edit', [
            "title" => "Edit Category",
            "category" => $category
        ]);
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

        $path = 'assets/uploads/categories/' . $category->main_image;
        if (File::exists($path)) {
            File::delete($path);
        }

        $category->delete();
        return redirect('/dashboard/categories')->with('delete', "Category " . $category->name . " has been deleted");
    }
}
