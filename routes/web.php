<?php

// Controller
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
// Laravel
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
