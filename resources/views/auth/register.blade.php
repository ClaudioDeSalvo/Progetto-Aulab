<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Registrati</h1>
                <h2>Unisciti ai venditori!</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 shadow rounded add-bg-beige">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.Nome Utente') }}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.Indirizzo email') }}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.Conferma Password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    {{-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                        <label class="form-check-label" for="exampleCheck1">Ricordami</label>
                    </div> --}}
                    <button type="submit" class="button-74 mb-5">{{ __('ui.Registrati') }}</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
