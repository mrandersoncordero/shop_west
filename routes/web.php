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
