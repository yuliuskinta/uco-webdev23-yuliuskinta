<x-template :title="$title">
    <div class="container py-3">
        <h1>{{ $title }}</h1>
        <form class="was-validated" method="post" action="{{ isset($category->id) ? route('categories.update', ['id' => $category->id]) : route('categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="order_no" class="form-label">Order no</label>
                <input type="number" class="form-control" name="order_no" id="order_no" value="{{ $category->order_no ?? '' }}" required>
            </div>
            <div class="mb-3">
                <a href="{{ route('categories.list') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</x-template>
