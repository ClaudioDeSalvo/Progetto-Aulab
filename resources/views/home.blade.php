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

    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="roboto-flex-title">Vendi ciò che vuoi !</h1>
            </div>
        </div>
    </div>
    {{-- crea articolo --}}

    <div class="container-fluid home-header">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @guest
                    <h2 class="text-center">Accedi per creare un annuncio</h2>
                @else
                    <a href="{{ route('announcement.create') }}" class="btn btn-primary">crea annuncio</a>
                @endguest

            </div>
        </div>
    </div>



    {{-- ultimi annunci --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-5 pt-5 roboto-flex-title">Ultimi annunci</h2>
            </div>
            @if (count($announcements) == 0)
                <div class="col-12">
                    <h2 class="text-center">Non ci sono annunci</h2>
                </div>
            @elseif (count($announcements) >= 6)
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-12 col-md-4">
                        <div class="card my-3 mx-1 shadow">
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
                        <div class="card my-3 mx-1 shadow">
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
