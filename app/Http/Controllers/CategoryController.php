<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
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

        return redirect()->route('categories.edit', $category)->with('message', [
            'class' => 'alert--success',
            'title' => 'Categoría creada correctamente',
            'content' => "La categoria ({$category->name}) hasido creada."
        ]);
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

        return redirect()->route('categories.edit', $category)->with('message', [
            'class' => 'alert--warning',
            'title' => 'Categoría actualizada correctamente',
            'content' => "La categoria ({$category->name}) hasido actulizada."
        ]);
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return back()->with('message', [
                'class' => 'alert--success',
                'title' => 'Categoría eliminada correctamente',
                'content' => "La categoria ({$category->name}) hasido eliminada."
            ]);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            
            // Verifica si la excepción es por violación de clave externa
            if ($errorCode == 1451) {
                return back()->with('message', [
                    'class' => 'alert--danger',
                    'title' => 'Error',
                    'content' => "No se puede eliminar la categoría porque tiene subcategorías asociadas"
                ]);
            }
    
            // Si no es una violación de clave externa, lanza la excepción nuevamente
            throw $e;
        }
    }
}
