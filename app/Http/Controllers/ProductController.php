<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all(),
            'subcategories' => Subcategory::all()
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'subcategory_id' => 'required',
            'code' => 'required|string|max:80',
            'name' => 'required|unique:products,name',
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
            'weight' => $request->weight,
            'format' => $request->format,
            'yield' => $request->yield,
            'traffic' => $request->traffic,
            'price' => $request->price,
            'image' => $imageName, 
        ]);

        $product->save();

        return redirect()->route('products.edit', $product);
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'subcategory_id' => 'required',
            'code' => 'required|string|max:80',
            'name' => 'required|unique:subcategories,name,'. $product->id,
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
                'weight' => $request->weight,
                'format' => $request->format,
                'yield' => $request->yield,
                'traffic' => $request->traffic,
                'price' => $request->price
            ]);
            return redirect()->route('products.edit', $product);
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
                'weight' => $request->weight,
                'format' => $request->format,
                'yield' => $request->yield,
                'traffic' => $request->traffic,
                'price' => $request->price,
                'image' => $imageName, 
            ]);
            return redirect()->route('products.edit', $product);
        }
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'subcategories' => Subcategory::all(),
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
