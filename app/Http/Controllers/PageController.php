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
}
