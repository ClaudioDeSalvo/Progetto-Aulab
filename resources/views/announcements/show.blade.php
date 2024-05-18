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
                <img src="{{ Storage::url($announcement->img) }}" class="img-fluid" alt="...">
            </div>
            <div class="col-12 col-md-6">
                <h2>{{ $announcement->title }}</h2>
                <h5>{{ $announcement->subtitle }}</h5>
                <p>{{ $announcement->body }}</p>
                <p>{{ $announcement->category->name }}</p>
            </div>
        </div>
    </div>
</x-layout>
