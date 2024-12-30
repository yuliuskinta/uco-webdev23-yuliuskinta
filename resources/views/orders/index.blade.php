@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order History</h1>

    @if($orders->isEmpty())
        <p>You have no orders yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Shipping Address</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
