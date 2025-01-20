<x-template title="Testimoni Pembeli">
    <div class="container py-5">
        <h1 class="text-center mb-4">Testimoni Pembeli</h1>
        <div class="row">
            @foreach($testimonials as $testimonial)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $testimonial->name }}</h5>
                        <p class="card-text">{{ $testimonial->message }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-template>
