<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
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

        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'required|string|max:255',
        ]);

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
        
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'required|string|max:255',
        ]);

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
