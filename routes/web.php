<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AboutController; // Add this line
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Add the route for the About page
Route::get('/about', function () {
    return view('about'); // This will return the about.blade.php view
})->name('about');

// Add the route for Tata Cara Pembelian page
Route::get('/tatacarapembelian', function () {
    return view('home.tatacarapembelian'); // This will return the tatacarapembelian.blade.php view
})->name('tatacarapembelian');

// Add the route for Testimoni Pembeli page
Route::get('/testimoni', [HomeController::class, 'showTestimonials'])->name('testimoni');

// Add the route for Lokasi Kami page
Route::get('/location', function () {
    return view('home.location'); // This will return the location.blade.php view
})->name('location');

// Add the route for Panduan Pembelian Barang page
Route::get('/panduan', function () {
    return view('home.panduan'); // This will return the panduan.blade.php view
})->name('panduan');

// Add the route for Pengiriman page
Route::get('/pengiriman', function () {
    return view('home.pengiriman'); // This will return the pengiriman.blade.php view
})->name('pengiriman');

// Add the route for Cara Menggunakan Situs Kami page
Route::get('/using', function () {
    return view('home.using'); // This will return the using.blade.php view
})->name('using');

// Add the route for Terms and Conditions page
Route::get('/termsandcondition', function () {
    return view('home.termsandcondition'); // This will return the termsandcondition.blade.php view
})->name('termsandcondition');

// Add the route for Promo page
Route::get('/promo', function () {
    return view('home.promo'); // This will return the promo.blade.php view
})->name('promo');

// Add the route for Return page
Route::get('/return', function () {
    return view('home.return'); // This will return the return.blade.php view
})->name('return');

//Add the route for Promo Tahun Baru page
Route::get('/promotahunbaru', function () {
    $products = App\Models\Product::all(); // Fetch all products
    return view('home.promotahunbaru', compact('products'));
})->name('promotahunbaru');

Route::prefix('/cart')->controller(CartController::class)->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('cart.list');
    Route::post('/add/{productId}', 'add')->name('cart.add');
    Route::post('/update/{id}', 'update')->name('cart.update');
    Route::post('/remove/{id}', 'remove')->name('cart.remove');
    Route::get('/checkout', 'showCheckoutForm')->name('checkout.form'); // New route for checkout form
    Route::post('/checkout/summary', 'showCheckoutSummary')->name('checkout.summary'); // New route for summary
    Route::post('/checkout', 'checkout')->name('checkout.process'); // New route for processing checkout
});

Route::prefix('/products')->controller(ProductController::class)->group(function() {
	Route::get('/', 'index')->name('products.list');
	Route::get('/create', 'create')->name('products.create');
	Route::post('/store', 'store')->name('products.store');
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
