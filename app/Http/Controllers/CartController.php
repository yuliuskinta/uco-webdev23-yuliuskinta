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
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        // Here you would typically process the order and save it to the database
        // For now, we will just clear the cart and return a success message

        Cart::where('user_id', Auth::id())->delete(); // Clear the cart

        $totalAmount = Cart::where('user_id', Auth::id())->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $buyerName = Auth::user()->name; // Assuming the user's name is stored in the 'name' field
        $address = $request->input('address');
        $paymentMethod = $request->input('payment_method');

        return view('cart.checkout_summary', compact('totalAmount', 'buyerName', 'address', 'paymentMethod'));
    }
}
