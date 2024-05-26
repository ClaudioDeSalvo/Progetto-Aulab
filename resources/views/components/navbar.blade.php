<div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            {{-- HOME --}}
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/storage/img/logo.png" class="imgNav" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- all the products --}}
                    <li class="nav-item SMN_effect-44">
                        <a class="nav-link @if (Route::currentRouteName() == 'announcement.indexAll') active @endif" aria-current="page"
                            href="{{ route('announcement.indexAll') }}">Articoli</a>
                    </li>
                    {{-- SEZIONI REVISOR --}}
                    @auth
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline success btn-sm position-relative w-sm-25 text-start @if (Route::currentRouteName() == 'revisor.index') active @endif"
                                    href="{{ route('revisor.index') }}">Zona Revisore
                                    <span
                                        class="position-absolute top-0 start- translate-middle badge rounded-pill bg-danger
                                    @if (\App\Models\Announcement::toBeRevisedCount() <= 0) d-none @endif">{{ \App\Models\Announcement::toBeRevisedCount() }}</span></a>
                            </li>
                        @endif
                    @endauth
                    {{-- DROPDOWN CATEGORIE --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link @if (Route::currentRouteName() == 'announcement.index') active @endif dropdown-toggle"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Route::currentRouteName() == 'announcement.index')
                                {{ $categoryName }}
                            @else
                                Categorie
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('announcement.index', [$category, 'categoryName' => $category->name]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @guest
                        {{-- register --}}
                        <li class="nav-item">
                            <a class="nav-link @if (Route::currentRouteName() == 'register') active @endif"
                                href="{{ route('register') }}">Registrati</a>
                        </li>
                        {{-- log in --}}
                        <li class="nav-item">
                            <a class="nav-link @if (Route::currentRouteName() == 'login') active @endif"
                                href="{{ route('login') }}">Accedi</a>
                        </li>
                    @else
                        {{-- user actions --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link @if (Route::currentRouteName() == 'revisor.request' || Route::currentRouteName() == 'announcement.create') active @endif dropdown-toggle"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ciao, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @if (!Auth::user()->is_revisor)
                                    <li><a class="dropdown-item" href="{{ route('revisor.request') }}">Diventa Revisor</a>
                                    </li>
                                @endif
                                <li>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('announcement.create') }}">Crea annuncio</a>
                                </li>
                                <li>
                                    {{-- 
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li> --}}
                                    {{-- LOGOUT USER --}}
                                    <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.querySelector('#logout-form').submit()">Esci</a>
                                </li>
                                <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                    @csrf
                                </form>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                {{-- DELETE USER --}}
                                <li><a class="dropdown-item" href="{{ route('user.destroy') }}"
                                        onclick="event.preventDefault();document.querySelector('#form-destroy').submit()">Cancella
                                        il tuo profilo</a></li>
                                <form action="{{ route('user.destroy') }}" id="form-destroy" method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
                {{-- SEARCH ZONE --}}
                <form class="d-flex mx-3" role="search" action="{{ route('announcement.search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="query">
                    <button class="btn btn-success" type="submit">Cerca</button>
                </form>

                <div class="nav-item dropdown lang-item">
                    <button class="btnlocal" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('vendor/blade-flags/language-' . 'it' . '.svg') }}" alt=""
                            width="32" height="32" class="" />
                    </button>
                    <ul class="dropdown-menu dropdown-custom">
                        <li><a class="dropdown-item" href=""><x-_local lang="en" /></a></li>
                        <li><a class="dropdown-item" href=""><x-_local lang="es" /></a></li>
                    </ul>
                </div>

            </div>
        </div>

    </nav>

</div>
