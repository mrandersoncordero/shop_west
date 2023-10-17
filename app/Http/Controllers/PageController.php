<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('page.index', [
            'products' => Product::take(5)->get(),
        ]);
    }

    public function products_view() {
        return view('page.products', [
            'products' => Product::all(),
        ]);
    }

    public function product_detail($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            return redirect()->route('error.page');
        }

        return view('page.product_detail', [
            'product' => $product,
        ]);
    }
}
