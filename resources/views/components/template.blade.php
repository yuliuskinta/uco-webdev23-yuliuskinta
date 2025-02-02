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
                <form class="input-group" role="search" action="{{ route('products.list') }}">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-light border" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <button class="btn btn-white border navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCategories" aria-controls="navbarCategories" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>

                @auth
                    <a href="{{ route('cart.list') }}" class="btn btn-white border">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle border" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Purchase history</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary text-nowrap">Login</a>
                @endauth

            </div>
        </div>


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
    </nav>
    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
