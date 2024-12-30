<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\EnsureProductIdValid;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/products')->controller(ProductController::class)->group(function() {
	Route::get('/', 'index')->name('products.list');
	Route::get('/create', 'create')->name('products.create');
	Route::post('/store', 'store')->name('products.store');
    // Route::middleware(EnsureProductIdValid::class)->group(function() {
    Route::middleware('productValid')->group(function() {
        Route::get('/edit/{id}', 'edit')->name('products.edit')->middleware('can:is-admin');
        Route::post('/update/{id}', 'update')->name('products.update')->middleware('can:is-admin');
        Route::post('/destroy/{id}', 'destroy')->name('products.destroy')->middleware('can:is-admin');
        Route::get('/show/{id}', 'show')->name('products.show');
    });
});

Route::prefix('/categories')->controller(CategoryController::class)->middleware('can:is-admin')->group(function() {
	Route::get('/', 'index')->name('categories.list');
	Route::get('/create', 'create')->name('categories.create');
	Route::post('/store', 'store')->name('categories.store');
	Route::get('/edit/{id}', 'edit')->name('categories.edit');
	Route::post('/update/{id}', 'update')->name('categories.update');
	Route::post('/destroy/{id}', 'destroy')->name('categories.destroy');
});

Route::prefix('/registration')->controller(RegistrationController::class)->middleware('guest')->group(function() {
    Route::get('/', 'index')->name('registration');
	Route::post('/store', 'store')->name('registration.store');
});

Route::prefix('/login')->controller(LoginController::class)->middleware('guest')->group(function() {
    Route::get('/', 'index')->name('login');
	Route::post('/store', 'store')->name('login.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::prefix('/cart')->controller(CartController::class)->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('cart.list');
});
