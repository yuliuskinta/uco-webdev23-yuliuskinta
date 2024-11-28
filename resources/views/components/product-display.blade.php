<a href="{{ route('products.show', ['id' => $id]) }}" class="product-card">
    <div class="card w-100">
        <img src="{{ $image }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">Rp {{ number_format($price, 0, ',', '.') }}</p>
        </div>
    </div>
</a>
