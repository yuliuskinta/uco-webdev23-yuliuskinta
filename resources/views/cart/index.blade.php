<x-template title="Shopping cart">
    <div class="container py-3">
        <h1>Shopping cart</h1>

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
<td><a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->name }}</a></td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->product->price, 2, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}</td>
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

            <h3>Subtotal: Rp {{ number_format($subtotal, 2, ',', '.') }}</h3>

            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        @endif
    </div>
</x-template>
