<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center mt-5 pt-2">
                <h1>{{__('ui.Accedi')}}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 shadow rounded add-bg-beige">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.Indirizzo email') }}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="button-74 mb-5">{{ __('ui.Invia') }}</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
