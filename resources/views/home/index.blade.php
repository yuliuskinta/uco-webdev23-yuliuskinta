<x-template>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/1.jpg" class="d-block w-100" alt="..." width="500px" height="700px">
          </div>
          <div class="carousel-item">
            <img src="/img/2.jpg" class="d-block w-100" alt="..." width="500px" height="700px">
          </div>
          <div class="carousel-item">
            <img src="/img/3.jpg" class="d-block w-100" alt="..." width="500px" height="700px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Produk Terbaru</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produk 1">
                    <div class="card-body">
                        <h5 class="card-title">Produk 1</h5>
                        <p class="card-text">Deskripsi singkat produk 1.</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produk 2">
                    <div class="card-body">
                        <h5 class="card-title">Produk 2</h5>
                        <p class="card-text">Deskripsi singkat produk 2.</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Produk 3">
                    <div class="card-body">
                        <h5 class="card-title">Produk 3</h5>
                        <p class="card-text">Deskripsi singkat produk 3.</p>
                        <a href="#" class="btn btn-primary">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <footer class="bg-light text-center py-4">
        <div class="container">
            <p>&copy; 2024 Toko Online. Semua hak dilindungi.</p>
        </div>
    </footer>
</x-template>
