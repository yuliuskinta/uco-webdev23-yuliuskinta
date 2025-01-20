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
            <a href="{{ route('about') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">About</a>
            <a href="{{ route('tatacarapembelian') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Tata Cara Pembelian</a>
            <a href="{{ route('testimoni') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Testimoni Pembeli</a>
            <a href="{{ route('panduan') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Panduan Pembelian Barang</a>
            <a href="{{ route('pengiriman') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Pengiriman</a>
            <a href="{{ route('using') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Cara Menggunakan Situs Kami</a>
            <a href="{{ route('termsandcondition') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Terms and Conditions</a>
            <a href="{{ route('promo') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Promo dan Voucher</a>
            <a href="{{ route('promotahunbaru') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Promosi Khusus</a>
            <a href="{{ route('return') }}" class="link-body-emphasis link-offset-3 link-underline-opacity-25 me-2">Retur dan Pengembalian Dana</a>
        </div>
        <div>
            &copy 2024
        </div>
    </div>
</x-template>
