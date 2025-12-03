<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');

// PRODUCT PAGE
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// PRODUCTS ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', App\Http\Controllers\Admin\ProductAdminController::class);
});


// CART
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// CHECKOUT
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// ADMIN — ENGLISH ROUTES
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('categories', CategoryAdminController::class)->names('categories');

    Route::resource('products', ProductAdminController::class)->names('products');
});
