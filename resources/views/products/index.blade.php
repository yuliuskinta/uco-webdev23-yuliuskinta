<x-template title="Product List">
    <a class="btn btn-primary" href="/products/create" role="button">Add New Product</a>
    <div class="row">
        @foreach ($data as $item)
            <div class="col-3">
                <x-product-card name="{{ $item['name'] }}" price="{{ $item['price'] }}"
                    image="{{ $item['image'] }}"></x-product-card>
            </div>
        @endforeach

    </div>
</x-template>
