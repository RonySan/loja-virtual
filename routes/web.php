<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StockMovementAdminController;

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


Route::prefix('admin')->group(function () {

    Route::get('/stock', [StockMovementAdminController::class, 'index'])->name('admin.stock.index');
    Route::get('/stock/create', [StockMovementAdminController::class, 'create'])->name('admin.stock.create');
    Route::post('/stock', [StockMovementAdminController::class, 'store'])->name('admin.stock.store');

});
Route::prefix('admin')->name('admin.')->group(function () {
    // outras rotas...

    Route::resource('clients', \App\Http\Controllers\Admin\ClientAdminController::class);
});


