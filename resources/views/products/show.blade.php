<x-template :title="$product->name">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-lg-flex">
        <div class="col-lg-8 bg-light border-lg-end">
            <img class="w-100" src="{{ asset($product->image) }}">
        </div>
        <div class="col-lg-4 ">
            <div class="container px-lg-5 py-5">
                <div class="text-muted mb-5 fst-italic">{{ $product->category->name }}</div>
                <h1 class="mb-4">{{ $product->name }}</h1>
                <div class="fw-semibold text-danger mb-4">
                    Rp {{ number_format($product->price, 2, ',', '.') }}
                </div>
                <form class="mb-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Qty.</span>
                        <input type="number" value="1" class="form-control" placeholder="Qty">
                    </div>
                    <button type="button" class="mb-3 btn btn-success w-100">
                        Add to cart
                    </button>
                </form>
                <p>
                    <div class="fst-italic text-muted">Description:</div>
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </div>

    <div class="dropdown position-fixed bottom-0 end-0 m-3">
        <button class="btn btn-secondary dropdown-toggle btn-lg" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-wrench"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="{{ route('products.edit', ['id' => $product->id]) }}">Edit product</a>
            <form method="POST" action="{{ route('products.destroy', ['id' => $product->id]) }}">
                @csrf
                <button type="submit" class="dropdown-item" href="{{ route('products.destroy', ['id' => $product->id]) }}">Delete product</button>
            </form>
        </div>
    </div>
</x-template>
