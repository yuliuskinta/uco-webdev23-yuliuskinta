<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Toko online saya' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar py-0 navbar-expand-lg d-block">
        <div class="d-flex container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" style="height:50px">
            </a>

            <div class="d-flex gap-2 py-2">
                <form action="/products/search" class="input-type" method="GET" role="search">
                    <input class="form-control" type="search" name="search" placeholder="search" aria-label="search">
                    <button class="btn btn-light border" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>


                <button class="btn btn-white border navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCategories" aria-controls="navbarCategories" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <a href="" class="btn btn-white border">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>

        <p>Toko Online Kinta</p>
        <div class="collapse navbar-collapse justify-content-center bg-light" id="navbarCategories">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center overflow-x-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('products.list') }}">All products</a>
                </li>

                @foreach(\App\Models\Category::getOrdered() as $category)
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('products.list', ['category' => $category->id]) }}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    <div>
        <p>

        </p>
    </div>

    <div class="collapse navbar-collapse justify-content-center">
        <form method="GET" action="{{ route('products.search') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                <select class="form-select" id="sel1" name="sort">
                    <option value="highest">Harga Tertinggi</option>
                    <option value="lowest">Harga Terendah</option>
                    <option value="name_asc">Nama A-Z</option>
                    <option value="name_desc">Nama Z-A</option>
                </select>
                <input type="number" name="min_price" class="form-control" placeholder="Min Harga" value="{{ request('min_price') }}">
                <input type="number" name="max_price" class="form-control" placeholder="Max Harga" value="{{ request('max_price') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </div>

    </nav>
    {{ $slot }}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>


</body>
</html>
