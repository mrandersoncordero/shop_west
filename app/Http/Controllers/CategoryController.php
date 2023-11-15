<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasPermission(1, 'No tienes permisos para ver productos')) {
            return view('admin.category.index', [
                'categories' => Category::all(),
            ]);
        }
    }

    public function create(Category $category)
    {
        return view('admin.category.create', ['category' => $category]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasPermission(2, 'No tienes permisos para crear productos')) {
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
                'content' => "La categoria ({$category->name}) ha sido creada."
            ]);
        }
    }

    public function edit(Category $category)
    {
        if (Auth::user()->hasPermission(3, 'No tienes permisos para editar categorias')) {
            return view('admin.category.edit', ['category' => $category]);
        }
    }

    public function update(Request $request, Category $category)
    {
        if (Auth::user()->hasPermission(3, 'No tienes permisos para editar categorias')) {
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
                'content' => "La categoria ({$category->name}) ha sido actulizada."
            ]);
        }
    }

    public function destroy(Category $category)
    {
        if (Auth::user()->hasPermission(4, 'No tienes permisos para eliminar categorias')) {
            try {
                $category->delete();
                return back()->with('message', [
                    'class' => 'alert--danger',
                    'title' => 'Categoría eliminada correctamente',
                    'content' => "La categoria ({$category->name}) ha sido eliminada."
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
}
