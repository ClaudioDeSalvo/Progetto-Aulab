<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            @if (session('message'))
                <div class="alert alert-success" id="session1">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent='save' enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input wire:model.blur="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                    <div>
                        @error('title') <span class="error bg-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sottotitolo</label>
                    <input wire:model.blur="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">
                    <div>
                        @error('subtitle') <span class="error bg-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Corpo del testo</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" wire:model.blur="body" id="" cols="30" rows="10"></textarea>
                    <div>
                        @error('body') <span class="error bg-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prezzo</label>
                    <input wire:model.blur="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                    <div>
                        @error('price') <span class="error bg-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Img</label>
                    <input wire:model="img" type="file" class="form-control" name="img">                   
                </div>
                <div class="mb-3">
                    <select wire:model="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>
