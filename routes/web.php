<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::prefix('/products')->controller(ProductController::class)->group(function() {
	Route::get('/', 'index')->name('products.list');
	Route::get('/create', 'create')->name('products.create');
	Route::post('/store', 'store')->name('products.store');
	Route::get('/edit/{id}', 'edit')->name('products.edit');
	Route::post('/update/{id}', 'update')->name('products.update');
	Route::post('/destroy/{id}', 'destroy')->name('products.destroy');
	Route::get('/show/{id}', 'show')->name('products.show');
});

Route::prefix('/categories')->controller(CategoryController::class)->group(function() {
	Route::get('/', 'index')->name('categories.list');
	Route::get('/create', 'create')->name('categories.create');
	Route::post('/store', 'store')->name('categories.store');
	Route::get('/edit/{id}', 'edit')->name('categories.edit');
	Route::post('/update/{id}', 'update')->name('categories.update');
	Route::post('/destroy/{id}', 'destroy')->name('categories.destroy');
});
