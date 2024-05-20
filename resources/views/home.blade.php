<x-layout>

    <div class="container-fluid bg-success">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Home page</h1>
                <h2>sotto titolo home </h2>
            </div>
        </div>
    </div>
    {{-- crea articolo --}}

    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @guest
                    <h2 class="text-center">Accedi per creare un annuncio</h2>
                @else
                    <a href="{{ route('announcement.create') }}" class="btn btn-success">crea annuncio</a>
                @endguest

            </div>
        </div>
    </div>
    {{-- ultimi annunci --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Ultimi annunci</h2>
            </div>
            @if (count($announcements) == 0)
                <div class="col-12">
                    <h2 class="text-center">Non ci sono annunci</h2>
                </div>
            @elseif (count($announcements) >= 6)
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-12 col-md-4">
                        <div class="card my-5 shadow">
                            <img src="{{ Storage::url($announcements[$i]->img) }}" class="card-img-top img-fluid"
                                alt="...">
                            <div class="card-body">
                                <h2 class="card-title">{{ $announcements[$i]->title }}</h2>
                                <h5 class="card-title">{{ $announcements[$i]->subtitle }}</h5>
                                <p class="card-text">{{ $announcements[$i]->category->name }}</p>
                                <p class="card-text">{{ $announcements[$i]->created_at }}</p>
                                <a href="{{ route('announcement.show', ['announcement' => $announcements[$i]]) }}"
                                    class="btn btn-primary">Vai ai dettagli</a>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @for ($i = 0; $i < count($announcements); $i++)
                    <div class="col-12 col-md-4">
                        <div class="card my-5 shadow">
                            <img src="{{ Storage::url($announcements[$i]->img) }}" class="card-img-top img-fluid"
                                alt="...">
                            <div class="card-body">
                                <h2 class="card-title">{{ $announcements[$i]->title }}</h2>
                                <h5 class="card-title">{{ $announcements[$i]->subtitle }}</h5>
                                <p class="card-text">{{ $announcements[$i]->category->name }}</p>
                                <p class="card-text">{{ $announcements[$i]->created_at }}</p>
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
