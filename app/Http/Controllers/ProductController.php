<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasPermission(9, 'No tienes permisos para ver productos')) {
            return view('admin.product.index', [
                'products' => Product::all(),
                'subcategories' => Subcategory::all()
            ]);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->hasPermission(10, 'No tienes permisos para crear productos')) {
            //dd($request->all());
            $request->validate([
                'subcategory_id' => 'required',
                'code' => 'required|string|max:80',
                'name' => 'required|unique:products,name',
                'description' => 'required|string|max:255',
                'weight' => 'integer',
                'format' => 'nullable|string|max:100',
                'yield' => 'nullable|string|max:100',
                'traffic' => 'nullable|string|max:100',
                'price' => 'regex:/^\d+(\.\d{1,2})?$/',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Procesar la imagen y almacenarla en el disco local
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                Storage::disk('products')->put($imageName, file_get_contents($image)); // Guardar la imagen en el disco local
            }
            
            // Crear el producto con los datos del formulario, incluyendo el nombre del archivo de imagen
            $product = new Product([
                'subcategory_id' => $request->subcategory_id,
                'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
                'weight' => $request->weight,
                'format' => $request->format,
                'yield' => $request->yield,
                'traffic' => $request->traffic,
                'price' => $request->price,
                'image' => $imageName, 
            ]);
            $product->save();

            return redirect()->route('products.edit', $product)->with('message', [
                'class' => 'alert--success',
                'title' => 'Producto creado exitosamente',
                'content' => "El producto {$product->name} ha sido creado."
            ]);
        }
    }

    public function update(Request $request, Product $product)
    {
        if (Auth::user()->hasPermission(11, 'No tienes permisos para editar productos')) {
            $this->validate($request,[
                'subcategory_id' => 'required',
                'code' => 'required|string|max:80',
                'name' => 'required|unique:subcategories,name,'. $product->id,
                'description' => 'required|string|max:255',
                'weight' => 'nullable|integer',
                'format' => 'nullable|string|max:100',
                'yield' => 'nullable|string|max:100',
                'traffic' => 'nullable|string|max:100',
                'price' => 'regex:/^\d+(\.\d{1,2})?$/'
            ]);
    
            if(!$request->image){
    
                $product->update([
                    'subcategory_id' => $request->subcategory_id,
                    'code' => $request->code,
                    'name' => $request->name,
                    'description' => $request->description,
                    'weight' => $request->weight,
                    'format' => $request->format,
                    'yield' => $request->yield,
                    'traffic' => $request->traffic,
                    'price' => $request->price
                ]);
                return redirect()->route('products.edit', $product)->with('message', [
                    'class' => 'alert--warning',
                    'title' => 'Producto actualizado correctamente',
                    'content' => "El producto {$product->name} fue actualizado correctamente"
                ]);
            }else{
                $this->validate($request,[
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                Storage::disk('products')->put($imageName, file_get_contents($image)); // Guardar la imagen en el disco local
        
                $product->update([
                    'subcategory_id' => $request->subcategory_id,
                    'code' => $request->code,
                    'name' => $request->name,
                    'description' => $request->description,
                    'weight' => $request->weight,
                    'format' => $request->format,
                    'yield' => $request->yield,
                    'traffic' => $request->traffic,
                    'price' => $request->price,
                    'image' => $imageName, 
                ]);
                return redirect()->route('products.edit', $product)->with('message', [
                    'class' => 'alert--warning',
                    'title' => 'Producto actualizado correctamente',
                    'content' => "El producto {$product->name} fue actualizado correctamente"
                ]);
            }
        }
    }

    public function edit(Product $product)
    {
        if (Auth::user()->hasPermission(11, 'No tienes permisos para editar productos')) {
            $subcategories =  Subcategory::all();
            return view('admin.product.edit', [
                'product' => $product,
                'subcategories' => $subcategories
            ]);
        }
    }

    public function destroy(Product $product)
    {
        if (Auth::user()->hasPermission(12, 'No tienes permisos para eliminar productos')) {
            try {
                $product->delete();

                return back()->with('message', [
                    'class' => 'alert--success',
                    'title' => 'Producto eliminado correctamente',
                    'content' => "El producto {$product->name} fue eliminado correctamente"
                ]);
            } catch (QueryException $e) {
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1451) {
                    return back()->with('message', [
                        'class' => 'alert--danger',
                        'title' => 'Error',
                        'content' => "No se puede eliminar el producto ({$product->name}) por que posee valores asociados"
                    ]);
                }
            }
        }
    }
}
