<x-layout>
    <div class="container-fluid yellowFont mt-4">
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-end">
                <h1 class="dispay-1">{{ __('ui.Zona revisore') }}</h1>
            </div>
            {{-- Reset button --}}
            @if (App\Models\Announcement::where('is_accepted', true)->orWhere('is_accepted', false)->count() > 0)
                <div class="pb-4 col-6 justify-content-start mt-3">
                    <form action="{{ route('reset') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="button-74">{{ __('ui.Resetta') }}</button>
                    </form>
                </div>
            @endif
            {{-- fine button --}}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if ($announcement_to_check)
        <div class="container-fluid d-flex">
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($announcement_to_check->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif ">
                                    <span><img src="{{ $image->getUrl(600, 600) }}" alt="Immagine segnaposto"
                                            class="img-fluid rounded shadow"></span>
                                    <div>
                                        <h5>Ratings</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">Adult</div>
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->adult }}"></div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">Violence</div>
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->violence }}"></div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">Spoof</div>
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">Racy</div>
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->racy }}"></div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">Medical</div>
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->medical }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($announcement_to_check->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mt-4 d-flex flex-column align-items-center">
                <div class="d-flex flex-column justify-content-center">
                    <h1>{{ __('ui.Titolo') }} : {{ $announcement_to_check->title }}</h1>
                    <h2>{{ __('ui.Sottotitolo') }} : {{ $announcement_to_check->subtitle }}</h2>
                    @if ($announcement_to_check->user_id != null)
                        <h3>{{ __('ui.Autore') }} : {{ $announcement_to_check->user->name }}</h3>
                    @endif
                    <h4>{{ __('ui.Prezzo') }} {{ $announcement_to_check->price }} €</h4>
                    <h4># {{ $announcement_to_check->category->name }}</h4>
                    <p>{{ $announcement_to_check->body }}</p>
                </div>
                <div class="d-flex pb-4 justify-content-around">
                    <form action="{{ route('accept', ['announcement' => $announcement_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="button-74 mx-5 mt-4">{{ __('ui.Approva') }}</button>
                    </form>
                    <form action="{{ route('reject', ['announcement' => $announcement_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="button-74 mx-5 mt-4">{{ __('ui.Rifiuta') }}</button>
                    </form>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h2>{{ __('ui.Nessun articolo da revisionare') }}</h2>
                    <a href="{{ route('home') }}">{{ __('ui.Torna alla Homepage') }}</a>
                </div>
            </div>
    @endif
    </div>
    </div>

    {{-- @if ($announcement_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-12 col-md-8">
                    <div class="row justify-content-center">
                        @foreach ($announcement_to_check->images as $key => $image)
                            <div class="col-md-4 text-center mb-4">
                                <img src="{{ $image->getUrl(600, 600) }}" alt="Immagine segnaposto"
                                    class="img-fluid rounded shadow">
                            </div>
                            <div class="col-md-8 ps-3">
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}


</x-layout>
