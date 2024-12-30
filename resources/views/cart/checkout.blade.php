@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="shipping_address">Shipping Address</label>
            <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ $subtotal }}" readonly>
        </div>
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>
@endsection
