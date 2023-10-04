<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInStockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ProductController::class)->group(function () {

    Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

        Route::get('/admin/product', 'indexAdmin')->name('product.indexAdmin');

        Route::get('/admin/product/create', 'create')->name('product.create');

        Route::post('/admin/product', 'store')->name('product.store');

        Route::get('/admin/product/{product}/edit', 'edit')->name('product.edit');

        Route::put('/admin/product/{product}', 'update')->name('product.update');

        Route::delete('/admin/product/{product}', 'destroy')->name('product.destroy');

        Route::post('/admin/product/{product}', 'recreate')->name('product.recreate');

        Route::get('/admin/product/{product}', 'showAdmin')->name('product.showAdmin');
    });

    Route::get('/', 'index')->middleware(['guest_verified_user'])->name('product.index');

    Route::get('/product/search', 'search')->middleware(['guest_verified_user'])->name('product.search');

    Route::get('/product/{id}', 'show')->middleware(['guest_verified_user'])->name('product.show');

    Route::post('/product/add/{id}', 'addToCart')->middleware(['auth', 'verified'])->name('product.addToCart');
});

Route::controller(ProductInStockController::class)->middleware(['auth', 'verified', 'role:admin'])->group(function () {

    Route::get('/admin/productInStocks/{product}/create', 'create')->name('productInStocks.create');

    Route::post('/admin/productInStocks/{product}', 'store')->name('productInStocks.store');

    Route::put('/admin/productInStocks/{productInStock}', 'update')->name('productInStocks.update');

    Route::get('/admin/productInStocks/{productInStock}/edit', 'edit')->name('productInStocks.edit');

    Route::delete('/admin/productInStocks/{productInStock}', 'destroy')->name('productInStocks.destroy');
});

Route::controller(CartController::class)->group(function () {

    Route::get('/cart', 'index')->middleware(['auth', 'verified'])->name('cart.index');

    Route::get('/cart/increment/{id}', 'increaseQuantity')->name('cart.increase');

    Route::get('/cart/decrement/{id}', 'decreaseQuantity')->name('cart.decrease');

    Route::post('/cart/checkout', 'checkout')->name('cart.checkout');

    Route::post('/cart/{id}', 'destroy')->name('cart.destroy');
});

Route::controller(ReviewController::class)->group(function () {
    
    Route::get('review/create/{id}/{billId}', 'create')->middleware(['auth', 'verified'])->name('review.create');

    Route::post('review/{id}/{billId}', 'store')->middleware(['auth', 'verified'])->name('review.store');
});

Route::controller(OrderController::class)->group(function () {

    Route::get('/checkout', 'index')->middleware(['auth', 'verified'])->name('order.index');

    Route::post('/order/store/{total}', 'placeOrder')->middleware(['auth', 'verified'])->name('order.store');
});

Route::controller(BillController::class)->group(function () {

    Route::get('/bill', 'index')->middleware(['auth', 'verified'])->name('bill.index');
    
    Route::get('/bill/{bill}', 'show')->middleware(['auth', 'verified'])->name('bill.show');

    Route::get('/bill/{id}/{status}', 'changeStatus')->name('bill.changeStatus');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/admin/users', UserController::class)
    ->middleware([
        'auth',
        'verified',
        'role:admin',
]);

require __DIR__ . '/auth.php';
