<a href="{{ route('products.show', ['id' => $product->id]) }}" class="product-card">
    <div class="card w-100">
        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }} image">
        <div class="card-body">
            <div class="fst-italic text-muted mb-3">{{ $product->category->name }}</div>
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
    </div>
</a>
