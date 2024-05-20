<x-layout>
    <div class="container-fluid bg-success">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="dispay-2">Dettaglio dell'annuncio {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                {{-- CAROUSEL IMG --}}
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active carousel-imgresize">
                            <img src="{{ Storage::url($announcement->img) }}" class="carousel-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item carousel-imgresize">
                            <img src="{{ Storage::url($announcement->img) }}" class="carousel-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item carousel-imgresize">
                            <img src="{{ Storage::url($announcement->img) }}" class="carousel-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            {{-- FINE CAROUSEL IMG --}}
                {{-- <img src="{{ Storage::url($announcement->img) }}" class="img-fluid" alt="..."> --}}
            </div>
            <div class="col-12 col-md-6">
                <h2>{{ $announcement->title }}</h2>
                <h5>{{ $announcement->subtitle }}</h5>
                <p>{{ $announcement->body }}</p>
                <p>{{ $announcement->price }}</p>
                <p>{{ $announcement->category->name }}</p>
            </div>
        </div>
    </div>
</x-layout>
