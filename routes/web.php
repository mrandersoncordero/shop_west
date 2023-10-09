<?php

// Controller
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// Laravel
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.admin');
    })->name('dashboard');

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/dashboard/categories', 'index')->name('categories.index');
        Route::get('/dashboard/categories/create', 'create')->name('categories.create');
        Route::get('/dashboard/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::delete('/dashboard/categories/{category}/destroy', 'destroy')->name('categories.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
