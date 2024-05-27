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
    <div class="container-fluid">
        <div class="row justify-content-center header">
            <div class="col-8">
                <h1 class="text-warning text-center">TITULO</h1>
            </div>

            <div class="col-6 text-center justify-content-center">
            </div>
        </div>
    </div>


    {{-- VINYL + BTN SECTION --}}
    <div class="container-fluid backgroundVinile ">
        <div class="row justify-content-center">
            <div class="col-4 p-0 " data-aos="fade-right" data-aos-duration="1500">
                <img src="/storage/img/yellowlogo.png" alt="vinile sx" class="vinileHome">
            </div>
            <div class="col-8 p-0 d-flex flex-column justify-content-center align-items-center">
                <div>
                    <h1>{{ __('ui.Crea qui il tuo annuncio') }}!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime consequuntur hic aliquam ex
                        perspiciatis est necessitatibus. Soluta deleniti ipsum tenetur accusamus eum libero odit
                        eveniet? Ut porro nobis illo distinctio.</p>
                    <button class="button-74" role="button">{{ __('ui.Crea annuncio') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ULTIMI ANNUNCI --}}
    <div class="container-fluid annunciContainer ">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-5 pt-5 roboto-flex-title">{{ __('ui.Ultimi Annunci') }}</h2>
            </div>
            @if (count($announcements) == 0)
                <div class="col-12">
                    <h2 class="text-center">Non ci sono annunci</h2>
                </div>
            @else
                @for ($i = 0; $i < count($announcements); $i++)
                    <div class="col-12 col-md-4 " data-aos="fade-up" data-aos-duration="3000">
                        <div class="single-card">
                            <div class="card-img ">
                                <img src="{{ $announcements[$i]->images()->first()->getUrl(300, 300) }}"
                                class="card-img-top img-fluid" alt="...">
                                </div>
                            <div class="content mb-5">
                                <h2 class="card-title text-center">{{ $announcements[$i]->title}}</h2>
                                <p class="card-text">{{ $announcements[$i]->category->name }}</p>
                                <p class="card-text">{{ $announcements[$i]->user->name }}</p>
                                <a href="{{ route('announcement.show', ['announcement' => $announcements[$i]]) }}"
                                    class="button-74">Vai ai dettagli</a>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>
    </div>
</x-layout>
