<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Página do produto
Route::get('/produto/{slug}', [ProductController::class, 'show'])->name('product.show');

// Carrinho
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Checkout (somente logado)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// ADMIN (somente admin)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('produtos', ProductAdminController::class);
});
