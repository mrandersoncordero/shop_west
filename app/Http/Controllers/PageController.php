<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('page.index', [
            'products' => Product::take(5)->get(),
            'categories' => $categories,
        ]);
    }

    public function products_view() {
        $categories = Category::all();
        return view('page.products', [
            'products' => Product::all(),
            'categories' => $categories,
        ]);
    }

    public function product_detail($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        if (!$product) {
            return redirect()->route('error.page');
        }

        return view('page.product_detail', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function products_by_category($id)
    {
        $category = Category::find($id);
        $categories = Category::all();

        return view('page.products_by_category', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}
