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
                    <a href="{{route('announcement.create')}}" class="btn btn-success">crea annuncio</a>
                @endguest

            </div>
        </div>
    </div>



</x-layout>
