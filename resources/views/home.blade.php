<x-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    {{-- LOGO HEADER --}}
    <div class="container-fluid mb-5">
        <div class="row d-flex flex-column align-items-center">
            <div class="col-12 align-items-center d-flex justify-content-center">
                <img src="/storage/img/logo.png" alt="">
            </div>
            <div class="col-6 text-center justify-content-center">
                <h1>Memorabilia Store</h1>
                <h2>I'll make you an offer you won't be able to refuse</h2>
            </div>
        </div>
    </div>
    {{-- VINYL + BTN SECTION --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4 p-0">
                <img src="/storage/img/vinile_arancio_dx.png" alt="vinile sx">
            </div>
            <div class="col-8 p-0 d-flex flex-column justify-content-center align-items-center sectionhome-Btn">
                <div>
                    <h1>Crea Annuncio</h1>
                    <p>Clicca qui ecc ecc</p>
                    <button class="button-74" role="button">Crea Annuncio</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ULTIMI ANNUNCI --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-5 pt-5 roboto-flex-title">Ultimi annunci</h2>
            </div>
            @if (count($announcements) == 0)
                <div class="col-12">
                    <h2 class="text-center">Non ci sono annunci</h2>
                </div>
            @else
                @for ($i = 0; $i < count($announcements); $i++)
                    <div class="col-12 col-md-4">
                        <div class="card my-3 mx-1 shadow">
                            <img src="{{ $announcements[$i]->images()->first()->getUrl(300, 300) }}"
                                class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">{{ $announcements[$i]->title }}</h2>
                                <h5 class="card-title">{{ $announcements[$i]->subtitle }}</h5>
                                <p class="card-text">{{ $announcements[$i]->category->name }}</p>
                                <p class="card-text">{{ $announcements[$i]->created_at }}</p>
                                <p class="card-text">{{ $announcements[$i]->user->name }}</p>
                                <a href="{{ route('announcement.show', ['announcement' => $announcements[$i]]) }}"
                                    class="btn btn-primary">Vai ai dettagli</a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>
    </div>
</x-layout>
