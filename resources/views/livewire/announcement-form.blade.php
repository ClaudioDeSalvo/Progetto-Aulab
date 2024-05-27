<div class="container pb-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="announcementCreate" class="row justify-content-center align-content-center vh-100">
        <div class="col-12 col-md-8 shadow rounded add-bg-beige">

            @if (session('message'))
                <div class="alert alert-success" id="session1">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent='save' enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('ui.Titolo') }}</label>
                    <input wire:model.blur="title" type="text"
                        class="form-control @error('title') is-invalid @enderror" name="title">
                    <div>
                        @error('title')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('ui.Sottotitolo') }}</label>
                    <input wire:model.blur="subtitle" type="text"
                        class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">
                    <div>
                        @error('subtitle')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('ui.Corpo del testo') }}</label>
                    <textarea class="form-control resizeCustom @error('body') is-invalid @enderror" name="body" wire:model.blur="body" id=""
                        cols="30" rows="10"></textarea>
                    <div>
                        @error('body')
                            <span class="error bg-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('ui.Prezzo') }}</label>
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
                    <div id="uploadSwitch" class="row d-none justify-content-center position-relative">
                        <div class="col-12 col-md-6">
                            <span  class="loader ms-0"></span>
                        </div>
                    </div>
                    @if (!empty($imgs))
                        <div id="imgUploaded" class="row">
                            <div class="col-12">
                                <p>{{ __('ui.Anteprima foto') }}</p>
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
                <button scrollY() id="btnCustom" type="submit" class="btn btn-primary">{{ __('ui.Invia') }}</button>
            </form>
        </div>
    </div>
</div>
