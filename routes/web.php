<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/','index');
    Route::get('/show/{id}', 'show');
    Route::get('/create',  'create');
    Route::get('/edit', 'edit');
});

