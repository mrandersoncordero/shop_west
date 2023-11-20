<?php

// Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
// Laravel
use Illuminate\Support\Facades\Route;

/**
 * Rutas de la tienda
 */

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/products', [PageController::class, 'products_view'])->name('products_view');
Route::get('/products/article/{id}', [PageController::class, 'product_detail'])->name('product_detail');
Route::get('/products/subcategory/{id}', [PageController::class, 'products_by_subcategory'])->name('products_by_subcategory');
Route::get('/products/category/{id}', [PageController::class, 'products_by_category'])->name('products_by_category');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
  



Route::middleware(['auth', 'role:client|admin'])->group(function () {
    /**
     * Rutas del carrito
     */
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/edit', [CartController::class, 'editProductCart'])->name('cart.edit');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    /**
     * Rutas de mis ordenes de compra
     */
    Route::get('/my_orders', [OrderController::class, 'view_index'])->name('order.index');
    Route::get('/my_orders/{order}', [OrderController::class, 'view_edit'])->name('order.edit');
    Route::resource('/store/payment', PaymentController::class)->except('edit', 'update', 'show');
});

/**
 * Rutas del panel administrativo
 */
Route::middleware(['role:admin|superuser'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.admin');
    })->name('dashboard');

    Route::resource('dashboard/categories', CategoryController::class)->except('show', 'create');
    Route::resource('dashboard/subcategories', SubcategoryController::class)->except('show', 'create');
    Route::resource('dashboard/products', ProductController::class)->except('show', 'create');
    Route::resource('dashboard/orders', OrderController::class)->except('show', 'create', 'store');
    Route::put('dashboard/orders/change_status/{order}', [OrderController::class, 'change_status_order'])->name('orders.change_status_order');
    Route::resource('dashboard/users', UserController::class)->except('show', 'create');

    Route::resource('dashboard/payments', PaymentController::class)->except('show', 'store', 'destroy', 'edit', 'update');

    Route::post('dashboard/add_permission_user', [PermissionController::class, 'addPermission'])->name('user.addPermission');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
