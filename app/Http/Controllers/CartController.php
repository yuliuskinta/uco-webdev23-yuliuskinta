<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request, $productId)
    {
        $cartItem = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $productId],
            ['quantity' => 0]
        );
        $cartItem->increment('quantity', $request->input('quantity', 1));
        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['quantity' => $request->input('quantity')]);
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function checkout(Request $request)
    {
        // Handle checkout logic here
    }
}
