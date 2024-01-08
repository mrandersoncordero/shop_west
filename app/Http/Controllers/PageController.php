<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductRating;
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

        $ratings = $product->ratings()->pluck('rating')->toArray(); // Obtener todas las calificaciones del producto

        $averageRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0; // Calcular el promedio

        return view('page.product_detail', [
            'product' => $product,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
            'averageRating' => $averageRating,
            'product_rating' => ProductRating::all(),
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

    public function about() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.about', [
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function project() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.project', [
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function contact() {
        $categories = Category::all();

        $cart = new CartController();
        return view('page.contact', [
            'categories' => $categories,
            'cart_products' => $cart->show_products()
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $categories = Category::all();
        $products = Product::where('name', 'LIKE', "%{$search}%")->paginate();
        $cart = new CartController();

        return view('page.search', [
            'search' => $search,
            'products' => $products,
            'categories' => $categories,
            'cart_products' => $cart->show_products(),
        ]);
    }
}
