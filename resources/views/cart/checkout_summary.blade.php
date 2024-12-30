<x-template title="Checkout Summary">
    <div class="container py-3">
        <h1>Checkout Summary</h1>

        <h5>Buyer Information</h5>
        <p>Name: {{ $buyerName }}</p>
        <p>Shipping Address: {{ $address }}</p>

        <h5>Payment Method</h5>
        <p>Payment Method: {{ $paymentMethod }}</p>

        <h5>Total Amount</h5>
        <p>Total: Rp {{ number_format($totalAmount, 2, ',', '.') }}</p>
    </div>
</x-template>
