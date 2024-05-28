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
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center header">

                <h1 class="glitch">CyberPresto</h1>
                <h3 class="yellowFont bold">games©</h3>

            </div>
        </div>
    </section>


    {{-- VINYL + BTN SECTION --}}
    <div class="container-fluid backgroundVinile ">
        <div class="row justify-content-center">
            <div class="col-4 p-0 " data-aos="fade-right" data-aos-duration="1500">
                <img src="/storage/img/yellowlogo.png" alt="vinile sx" class="vinileHome">
            </div>
            <div class="col-8 p-0 d-flex flex-column justify-content-center align-items-center">
                <div>
                    <h1>{{ __('ui.Crea qui il tuo annuncio') }}</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime consequuntur hic aliquam ex
                        perspiciatis est necessitatibus. Soluta deleniti ipsum tenetur accusamus eum libero odit
                        eveniet? Ut porro nobis illo distinctio.</p>
                    <a class="btn button-74" href="{{ route('announcement.create')}}">{{ __('ui.Crea annuncio') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- I NOSTRI NUMERI --}}
    <section class="container-fluid" id="numbersSection">
        <div class="row justify-content-between bg-darkBlue flex-column-reverse flex-md-row">
            <!-- Immagine di sinistra -->
            <div class="col-12 col-md-3 ps-0">
                <img data-aos="fade-right" data-aos-duration="1000" class="img-fluid numbers-img"
                    src="../imgs/android.png" alt="">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center flex-column text-center text-md-start">
                <h2 class="font-title display-2 glitch"> Un pò di numeri </h2>
                <p class="my-3 fs-4 yellowFont"><span id="firstNumber" class="fw-bold fs-1 me-3 yellowFont">0</span>
                    Giochi venduti </p>
                <p class="my-3 fs-4 yellowFont"><span id="secondNumber" class="fw-bold fs-1 me-3 yellowFont">0</span>
                    Clienti
                    soddisfatti</p>
                <p class="my-3 fs-4 yellowFont"><span id="thirdNumber" class="fw-bold fs-1 me-3 yellowFont">0</span>
                    Recensioni ricevute
                </p>
            </div>
        </div>
    </section>

    {{-- ULTIMI ANNUNCI --}}
    <div class="container-fluid annunciContainer ">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-5 pt-5 roboto-flex-title glitch">{{ __('ui.Ultimi Annunci') }}</h2>
            </div>
            @if (count($announcements) == 0)
                <div class="col-12">
                    <h2 class="text-center">Non ci sono annunci</h2>
                </div>
            @else
                @for ($i = 0; $i < count($announcements); $i++)
                    <div class="col-12 col-md-4 " data-aos="fade-up" data-aos-duration="3000">
                        <div class="single-card">
                            <div class="card-img">
                                <img src="{{ $announcements[$i]->images()->first()->getUrl(300, 300) }}"
                                    class="card-img-top img-fluid" alt="...">
                            </div>
                            <div class="content mb-5">
                                <h2 class="card-title text-center">{{ $announcements[$i]->title }}</h2>
                                <p class="card-text">{{ $announcements[$i]->category->name }}</p>
                                @if ($announcements[$i]->user != null)
                                    <p class="card-text">{{ $announcements[$i]->user->name }}</p>
                                @endif
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
