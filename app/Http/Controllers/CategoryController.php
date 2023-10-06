<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create(Category $category)
    {
        return view('admin.category.create', ['category' => $category]);
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.edit', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {

        //dd($request->all());
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.edit', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
