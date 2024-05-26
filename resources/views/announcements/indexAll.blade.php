<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 mb-5">I nostri annunci</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 my-3">
                    <div class="card-74" data-aos="fade-up" data-aos-duration="3000">
                        <img src="{{ $announcement->images()->first()->getUrl(300, 300) }}"
                            class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{ $announcement->title }}</h2>
                            <h5 class="card-title">{{ $announcement->subtitle }}</h5>
                            <p class="card-text">{{ $announcement->category->name }}</p>
                            <p class="card-text">{{ $announcement->created_at }}</p>
                            <p class="card-text">{{ $announcement->user->name }}</p>
                            <a href="{{ route('announcement.show', compact('announcement')) }}"
                                class="button-74 mb-2">Vai ai dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
