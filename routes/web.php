<?php

// Controller
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InterestedClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
// Laravel
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/**
 * Rutas públicas del sitio
 */
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/productos', [PageController::class, 'products_view'])->name('products_view');
Route::get('/productos/articulo/{product:slug}', [PageController::class, 'product_detail'])->name('product_detail');
Route::get('/productos/subcategoria/{subcategory:slug}', [PageController::class, 'products_by_subcategory'])->name('products_by_subcategory');
Route::get('/productos/categoria/{category:slug}', [PageController::class, 'products_by_category'])->name('products_by_category');
Route::get('/nosotros', [PageController::class, 'about'])->name('about');
Route::get('/proyectos', [PageController::class, 'project'])->name('project');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/buscar', [PageController::class, 'search'])->name('search');
Route::post('/clientes-interesados', [InterestedClientController::class, 'store'])->name('interested-clients.store');
Route::post('/enviar-mensaje', [ContactController::class, 'send_email'])->name('send.email');

/**
 * Rutas de Noticias
 */
Route::get('/noticias', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/noticias/categoria/{category:slug}', [App\Http\Controllers\NewsController::class, 'byCategory'])->name('news.category');
Route::get('/noticias/etiqueta/{tag:slug}', [App\Http\Controllers\NewsController::class, 'byTag'])->name('news.tag');
Route::get('/noticias/{news:slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

/**
 * Redirects 301 para URLs antiguas (compatibilidad SEO con producción)
 */
Route::get('/products', fn () => Redirect::route('products_view', [], 301));
Route::get('/products/article/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);

    return Redirect::route('product_detail', $product->slug, 301);
});
Route::get('/products/category/{id}', function ($id) {
    $category = \App\Models\Category::findOrFail($id);

    return Redirect::route('products_by_category', $category->slug, 301);
});
Route::get('/products/subcategory/{id}', function ($id) {
    $subcategory = \App\Models\Subcategory::findOrFail($id);

    return Redirect::route('products_by_subcategory', $subcategory->slug, 301);
});
Route::get('/about', fn () => Redirect::route('about', [], 301));
Route::get('/project', fn () => Redirect::route('project', [], 301));
Route::get('/contact', fn () => Redirect::route('contact', [], 301));
Route::get('/search', fn () => Redirect::route('search', [], 301));

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

    /**
     * Rating
     */
    Route::post('/productos/{product:slug}/valorar', [ProductController::class, 'rateProduct'])->name('products.rate');

    /**
     * Profile
     */
    Route::get('/profile/view/', [UserController::class, 'viewProfile'])->name('user.view');
    Route::get('/profile/edit/{user}', [UserController::class, 'editProfile'])->name('user.edit');
    Route::post('/profile/update/{user}', [UserController::class, 'updateProfile'])->name('user.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
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
    Route::resource('dashboard/orders', OrderController::class)->except('create', 'store');
    Route::post('dashboard/orders/{order}/add-product', [OrderController::class, 'addProduct'])->name('orders.addProduct');
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

require __DIR__.'/auth.php';
