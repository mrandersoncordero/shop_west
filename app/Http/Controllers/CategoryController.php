<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        App::setLocale('es');

        $request->validate([
            'name' => 'required|unique:categories,name'
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
        App::setLocale('es');
        
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
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
