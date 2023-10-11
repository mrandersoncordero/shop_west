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
}
