<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Página do produto
Route::get('/produto/{slug}', [ProductController::class, 'show'])->name('product.show');

// Carrinho
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// ROTAS ADMIN (sem autenticação por enquanto)
Route::prefix('admin')->group(function () {
    Route::resource('produtos', ProductAdminController::class)->names('produtos');
    Route::resource('categorias', CategoryAdminController::class)->names('categorias');
});
