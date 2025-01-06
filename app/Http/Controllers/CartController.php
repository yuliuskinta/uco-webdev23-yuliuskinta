<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
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
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $productId],
            ['quantity' => 0]
        );
        $cartItem->increment('quantity', $request->input('quantity', 1));

        return redirect()->route('cart.list')->with('success', 'Product added to cart.');
    }

    public function remove($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.list')->with('success', 'Product removed from cart.');
        }
        return redirect()->route('cart.list')->with('error', 'Product not found in cart.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Here you would typically process the order and save it to the database
        // For now, we will just clear the cart and return a success message

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        // Clear the cart after calculating subtotal
        Cart::where('user_id', Auth::id())->delete(); // Clear the cart

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        $buyerName = $request->input('name'); // Get the buyer's name from the request
        $address = $request->input('address');
        $paymentMethod = $request->input('payment_method');

        return view('cart.checkout_summary', compact('subtotal', 'buyerName', 'address', 'paymentMethod'));
    }
}
