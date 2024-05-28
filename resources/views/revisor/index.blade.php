<x-layout>
    <div class="container-fluid yellowFont">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="dispay-1">{{ __('ui.Zona revisore') }}</h1>
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
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @foreach ($announcement_to_check->images as $key => $image)
                            <div class="col-6 col-md-4 text-center mb-4">
                                <img src="{{ $image->getUrl(600, 600) }}" alt="Immagine segnaposto"
                                    class="img-fluid rounded shadow">
                            </div>
                            <div class="col-md-8 ps-3">
                                <div class="card-body">
                                    <h5>Ratings</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->adult }}"></div>
                                            </div>
                                            <div class="col-10">adult</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->violence }}"></div>
                                            </div>
                                            <div class="col-10">violence</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                            </div>
                                            <div class="col-10">spoof</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->racy }}"></div>
                                            </div>
                                            <div class="col-10">racy</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->medical }}"></div>
                                            </div>
                                            <div class="col-10">medical</div>
                                        </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-4 d-flex flex-column align-items-center">
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
                        <button type="submit" class="btn btn-success mx-3">{{ __('ui.Approva') }}</button>
                    </form>
                    <form action="{{ route('reject', ['announcement' => $announcement_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger">{{ __('ui.Rifiuta') }}</button>
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

        {{-- Reset button --}}
        @if (App\Models\Announcement::where('is_accepted', true)->orWhere('is_accepted', false)->count() > 0)
            <form action="{{ route('reset') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="button-74">{{ __('ui.Resetta') }}</button>
            </form>
        @endif
    </div>

</x-layout>
