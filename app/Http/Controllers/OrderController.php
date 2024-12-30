<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|string|max:50',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_address' => $request->input('shipping_address'),
            'payment_method' => $request->input('payment_method'),
            'total_amount' => $request->input('total_amount'), // This should be calculated based on cart items
        ]);

        // Clear the cart after successful checkout
        // Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }
}
