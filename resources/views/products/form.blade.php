<x-template :title="$title">
    <div class="container py-3">
        <h1>{{ $title }}</h1>
        <form class="was-validated" enctype="multipart/form-data" method="post" action="{{ isset($product->id) ? route('products.update', ['id' => $product->id]) : route('products.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name ?? old('name') ?? '' }}" required>
                @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{ $product->description ?? old('description') ?? '' }}</textarea>
                @if($errors->has('description'))
                    <div class="text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Category</label>
                @php
                $selected_category_id = old('category_id');
                if (!$selected_category_id && isset($product)) {
                    $selected_category_id = $product->category_id;
                }
                @endphp
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" disabled selected>Select category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($selected_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="text-danger">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price ?? old('price') ?? 0 }}" min="1" required>
                @if($errors->has('price'))
                    <div class="text-danger">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                @if($errors->has('image'))
                    <div class="text-danger">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                @if(isset($product) && $product->image)
                    <img src="{{ asset($product->image) }}" class="mt-3" style="height:300px;width:300px;">
                @endif
            </div>
            <div class="mb-3">
                <a href="{{ route('products.list') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</x-template>
