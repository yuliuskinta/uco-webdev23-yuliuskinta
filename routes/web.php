<?php

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
