<x-template title="Daftar produk">
    <div class="container py-3">
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <x-product-display :name="$product->name" :price="$product->price" :id="$product->id" :image="$product->image"></x-product-display>
            </div>
            @endforeach
        </div>
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-lg btn-success position-fixed bottom-0 end-0 m-3" title="Add new product" data-bs-toggle="tooltip">
        <i class="fa-solid fa-plus"></i>
    </a>
</x-template>
