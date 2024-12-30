@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Subtotal: ${{ number_format($subtotal, 2) }}</h3>

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
    @endif
    </div>
@endsection
