<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form wire:submit.prevent='save' enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input wire:model="title" type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sottotitolo</label>
                    <input wire:model="subtitle" type="text" class="form-control" name="subtitle">
                </div>
                <div class="mb-3 form-check">
                    <label class="form-label">Corpo del testo</label>
                    <textarea class="form-control" name="body" wire:model="body" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3 form-check">
                    <label class="form-label">Prezzo</label>
                    <input wire:model="price" type="text" class="form-control" name="price">
                </div>
                <div class="mb-3 form-check">
                    <label class="form-label">Img</label>
                    <input wire:model="img" type="file" class="form-control" name="img">
                </div>
                <div class="mb-3 form-check">
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
