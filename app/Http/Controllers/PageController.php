<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.index', [
            'products' => Product::take(5)->get(),
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function products_view() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.products', [
            'products' => Product::all(),
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function product_detail($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $cart = new CartController();

        if (!$product) {
            return redirect()->route('error.page');
        }

        return view('page.product_detail', [
            'product' => $product,
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function products_by_category($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        $cart = new CartController();

        return view('page.products_by_category', [
            'category' => $category,
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function products_by_subcategory($id)
    {
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $cart = new CartController();

        return view('page.products_by_subcategory', [
            'subcategory' => $subcategory,
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }
}
