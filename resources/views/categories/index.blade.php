<x-template title="Categories">
    <div class="container py-3">
        <h1>Categories</h1>
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Order no</th>
                    <th style="width:50px">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->order_no }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-lg" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit category</a>
                                <form method="POST" action="{{ route('categories.destroy', ['id' => $category->id]) }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="{{ route('categories.destroy', ['id' => $category->id]) }}">Delete category</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('categories.create') }}" class="btn btn-lg btn-success position-fixed bottom-0 end-0 m-3" title="Add new category" data-bs-toggle="tooltip">
        <i class="fa-solid fa-plus"></i>
    </a>
</x-template>
