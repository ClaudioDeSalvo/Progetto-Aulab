<x-layout>
    <div class="container-fluid bg-success">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="dispay-1">Gli annunci</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">
                
                @foreach ($announcements as $announcement)
                    <div class="card">
                        <img src="{{Storage::url($announcement->img)}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{$announcement->title}}</h2>
                            <h5 class="card-title">{{$announcement->subtitle}}</h5>
                            {{-- @dd($announcement->category) --}}
                            <p class="card-text">{{$announcement->category->name}}</p>

                            <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary">Vai ai dettagli</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
