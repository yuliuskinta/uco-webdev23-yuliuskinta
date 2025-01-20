<x-template title="Promosi Khusus">
    <div class="container py-5">
        <h1 class="text-center mb-4">Promosi Khusus - Diskon Rp. 100.000</h1>
        <div class="row">
            @foreach($products as $product)
            <div class="col-6 col-lg-3 mb-4">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            <span class="text-danger">Rp. {{ number_format($product->price - 100000, 0, ',', '.') }}</span>
                            <span class="text-muted"><del>Rp. {{ number_format($product->price, 0, ',', '.') }}</del></span>
                        </p>
                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-template>
