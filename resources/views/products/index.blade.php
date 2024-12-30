<x-template title="Daftar produk">
    <div class="container py-3">
        <h1 class="text-uppercase fst-italic mb-4">
            @if(!empty($searchQueries))
            {{ implode(" - ", $searchQueries) }}
            @else
            All products
            @endif
        </h1>

        <form class="row">
            @if(request()->search)
                <input type="hidden" name="search" value="{{ request()->search }}">
            @endif
            @if(request()->category)
                <input type="hidden" name="category" value="{{ request()->category }}">
            @endif
            <div class="col-md-5">
                <div class="input-group mb-4">
                    <span class="input-group-text">Price</span>
                    <input type="number" class="form-control" name="priceFrom" value="{{ request()->priceFrom }}">
                    <span class="input-group-text">to</span>
                    <input type="number" class="form-control" name="priceTo" value="{{ request()->priceTo }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-4">
                    <span class="input-group-text">Sort</span>
                    <select class="form-select" name="sort">
                        @foreach($sortOptions as $value => $label)
                        <option value="{{ $value }}" @if($value == request()->sort) selected @endif>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-secondary">Apply</button>
            </div>
        </form>

        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-6 mb-4">
                <x-product-display :product="$product"></x-product-display>
            </div>
            @endforeach
        </div>

        {{ $products->links() }}
    </div>

    <a href="{{ route('products.create') }}" class="btn btn-lg btn-success position-fixed bottom-0 end-0 m-3" title="Add new product" data-bs-toggle="tooltip">
        <i class="fa-solid fa-plus"></i>
    </a>
</x-template>
