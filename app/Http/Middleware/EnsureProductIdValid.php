<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProductIdValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil parameter id dari route
        $productId = $request->route()->parameter('id');

        // Cari product dengan parameter id yang diberikan
        $product = Product::where('id', $productId)->firstOrFail();

        // Tambah atribut 'product' di request
        $request->merge(['product' => $product]);

        // Lanjut ke controller
        return $next($request);
    }
}
