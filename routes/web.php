<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

    Route::get('/', 'index')->middleware(['guest_verified_user'])->name('product.index');

    Route::get('/product/search', 'search')->middleware(['guest_verified_user'])->name('product.search');

    Route::get('/product/{id}', 'show')->name('product.show');

    Route::post('/product/add/{id}', 'addToCart')->middleware(['auth', 'verified'])->name('product.addToCart');
});

Route::controller(CartController::class)->group(function () {

    Route::get('/cart', 'index')->middleware(['auth', 'verified'])->name('cart.index');

    Route::get('/cart/{update}/{id}', 'updateQuantity')->name('cart.update');

    Route::post('/cart/checkout', 'checkout')->name('cart.checkout');

    Route::post('/cart/{id}', 'destroy')->name('cart.destroy');
});

Route::get('/product', [ProductController::class, 'indexAdmin'])->middleware([
    'auth',
    'verified',
    'role:admin',
])->name('product.indexAdmin');
Route::controller(OrderController::class)->group(function () {

    Route::get('/checkout', 'index')->middleware(['auth', 'verified'])->name('order.index');

    Route::post('/order/store/{total}', 'placeOrder')->middleware(['auth', 'verified'])->name('order.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/users', UserController::class)
    ->middleware([
        'auth',
        'verified',
        'role:admin',
]);

require __DIR__ . '/auth.php';
