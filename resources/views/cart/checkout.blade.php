<x-template title="Checkout">
    <div class="container py-3">
        <h1>Checkout</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cart.checkout') }}">
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <h5>Payment Method</h5>
            <div class="mb-3">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="payment_method" value="bank_transfer" checked>
                    Bank Mandiri (Account Number: 22222)
                </label>
            </div>

            <button type="submit" class="btn btn-success">Complete Checkout</button>
        </form>
    </div>
</x-template>
