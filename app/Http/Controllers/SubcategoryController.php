<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Database\QueryException;

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

        return redirect()->route('subcategories.edit', $subcategory)->with('message', [
            'class' => 'alert--success',
            'title' => 'Subcategoria creada correctamente',
            'content' => "La subcategoria ({$subcategory->name}) ha sido creada."
        ]);
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

        return redirect()->route('subcategories.edit', $subcategory)->with('message', [
            'class' => 'alert--warning',
            'title' => 'Subcategoria actualizada correctamente',
            'content' => "La subcategoria ({$subcategory->name}) ha sido actulizada."
        ]);
    }

    public function destroy(Subcategory $subcategory)
    {
        try {
            $subcategory->delete();
            return back()->with('message', [
                'class' => 'alert--success',
                'title' => 'Subcategoria Eliminada correctamente',
                'content' => "La subcategoria ({$subcategory->name}) ha sido eliminada."
            ]);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1451) {
                return back()->with('message', [
                    'class' => 'alert--danger',
                    'title' => 'Error',
                    'content' => 'Lo sentimos no podemos eliminar la subcategoria porque tiene datos asociados'
                ]);
            }

            throw $e;
        }
        
    }
}
