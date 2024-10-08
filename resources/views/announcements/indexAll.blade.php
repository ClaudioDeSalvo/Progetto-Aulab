<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 h1-alt mb-5">{{ __('ui.I nostri annunci') }} </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 d-flex justify-content-center" data-aos="fade-up" data-aos-duration="3000">
                    <div class="single-card">
                        <div class="card-img">
                            <img src="{{ $announcement->images()->first()->getUrl(600, 600) }}"
                                class="card-img-top img-fluid" alt="...">
                        </div>
                        <div class="content mb-5">
                            <h2 class="card-title text-center">{{ $announcement->title }}</h2>
                            <p class="card-text">{{ $announcement->category->name }}</p>
                            @if ($announcement->user_id != null)
                                <p class="card-text">{{ $announcement->user->name }}</p>
                            @endif
                            <a href="{{ route('announcement.show', ['announcement' => $announcement]) }}"
                                class="button-74">{{ __('ui.Dettagli') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $announcements->links() !!}
    </div>
</x-layout>
