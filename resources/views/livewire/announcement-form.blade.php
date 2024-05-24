<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                    <input wire:model.blur="title" type="text"
                        class="form-control @error('title') is-invalid @enderror" name="title">
                    <div>
                        @error('title')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sottotitolo</label>
                    <input wire:model.blur="subtitle" type="text"
                        class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">
                    <div>
                        @error('subtitle')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Corpo del testo</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" wire:model.blur="body" id=""
                        cols="30" rows="10"></textarea>
                    <div>
                        @error('body')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Prezzo</label>
                    <input wire:model.blur="price" type="text"
                        class="form-control @error('price') is-invalid @enderror" name="price">
                    <div>
                        @error('price')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Img</label>
                    <input id="imgInput" wire:model.live="temporary_imgs" multiple type="file"
                        class="form-control @error('temporary_imgs.*') is-invalid @enderror" name="img">
                    <div>
                        @error('temporary_imgs.*')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                        @error('temporary_imgs')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (!empty($imgs))
                        <div class="row">
                            <div class="col-12">
                                <p>Anteprima foto</p>
                                <div class="row border border-4 border-success rounded shadow px-4 py-4">
                                    @foreach ($imgs as $key => $img)
                                        <div class="col d-flex flex-column align-items-center my-3 ">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image:url({{ $img->temporaryUrl() }});">
                                            </div>
                                            <button type="button" class="btn mt-1 btn-danger"
                                                wire:click="removeImg({{ $key }})">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
                <div class="mb-3">
                    <select wire:model="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="btnCustom" type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>
