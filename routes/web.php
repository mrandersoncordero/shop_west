<?php

// Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubcategoryController;
// Laravel
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/products', 'products_view')->name('products_view');
    Route::get('/products/article/{id}', 'product_detail')->name('product_detail');
    Route::get('/products/subcategory/{id}', 'products_by_subcategory')->name('products_by_subcategory');
    Route::get('/products/category/{id}', 'products_by_category')->name('products_by_category');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.admin');
    })->name('dashboard');

    Route::resource('dashboard/categories', CategoryController::class)->except('show', 'create');
    Route::resource('dashboard/subcategories', SubcategoryController::class)->except('show', 'create');
    Route::resource('dashboard/products', ProductController::class)->except('show', 'create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
