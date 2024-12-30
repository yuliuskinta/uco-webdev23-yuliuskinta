<x-template>
    <div class="h-50">
        <img src="{{ asset('img/banner.png') }}" class="w-100">
    </div>
    <div class="p-5">
        <h1 class="text-uppercase fst-italic text-center mb-5">NEW ARRIVALS</h1>
        <div class="row">
            @foreach($newArrival as $product)
            <div class="col-6 col-lg-3 mb-4">
                <x-product-display :product="$product"></x-product-display>
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-5 bg-dark text-light">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-4">
                    Stay updated with our latest offers and exclusive deals! Subscribe with your email today and never miss out on exciting news.
                </h3>
            </div>
            <div class="col-lg-6">
                <form>
                    <input type="email" class="form-control form-control-lg mb-3" placeholder="Email" required>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="p-5 d-flex justify-content-between">
        <div>
            <a href="" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">About</a>
            <a href="" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Privacy Policy</a>
            <a href="" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Terms and Conditions</a>
            <a href="" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Contact Us</a>
        </div>
        <div>
            &copy 2024
        </div>
    </div>
</x-template>
