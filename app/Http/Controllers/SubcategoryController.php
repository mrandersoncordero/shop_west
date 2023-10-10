<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.subcategory.index', [
            'subcategories' => Subcategory::all(),
            'categories' => Category::all(),
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories,name',
            'description' => 'string|max:255',
            'category_id' => 'required'
        ]);

        $subcategory = Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        return redirect()->route('subcategories.edit', $subcategory);
    }

    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', [
            'subcategory' => $subcategory,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        
        $request->validate([
            'name' => 'required|unique:subcategories,name,' . $subcategory->id,
            'description' => 'string|max:255',
            'category_id' => 'required'
        ]);
        
        //dd($request->all());
        $subcategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('subcategories.edit', $subcategory);
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
    }
}
