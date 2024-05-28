<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
<<<<<<< HEAD
use App\Jobs\GoogleVisionLabelImage;
=======
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AnnouncementForm extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $body;
    public $category_id;
    public $imgs = [];
    public $temporary_imgs;

    protected $rules = [
        'title' => 'required|min:5',
        'subtitle' => 'required|min:5',
        'price' => 'required|numeric|min:1',
        'body' => 'required|min:15',
        'category_id' => 'required|exists:categories,id', // Limit image size to 1MB

    ];
    protected $messages = [
        'title.required' => 'Il campo titolo è richiesto',
        'title.min' => 'Il campo titolo è troppo corto',
        'subtitle.required' => 'Il campo sottotitolo è richiesto',
        'subtitle.min' => 'Il campo sottotitolo è troppo corto',
        'price.required' => 'Il campo prezzo è richiesto',
        'price.min' => 'Il campo prezzo è troppo basso',
        'body.required' => 'Il campo corpo è richiesto',
        'body.min' => 'Il campo corpo è troppo corto',
        'category_id.required' => 'Il campo categoria è richiesto',
        'category_id.exists' => 'La categoria selezionata non esiste',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function updatedTemporaryImgs()
    {
        if (
            $this->validate([
                'temporary_imgs.*' => 'image|max:1024',
                'temporary_imgs' => 'max:6',
            ])
        ) {
            foreach ($this->temporary_imgs as $img) {
                $this->imgs[] = $img;
            }
        }
    }
    public function removeImg($key)
    {
        if (in_array($key, array_keys($this->imgs))) {
            unset($this->imgs[$key]);
        }
    }

    public function save()
    {

        $this->validate();
        $this->announcement = Announcement::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);
        if (count($this->imgs) > 0) {
            foreach ($this->imgs as $img) {
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $img->store($newFileName, 'public')]);
<<<<<<< HEAD
                // dispatch(new ResizeImage($newImage->path, 300, 300));
                // dispatch(new ResizeImage($newImage->path, 300, 300)));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
=======
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
>>>>>>> 8d5ef74a6f8f10e41828d3ad2186adbe88a1b450
            }
        } else {
            $this->announcement->images()->create(['path' => 'public/img/annunciodefault.jpg']);
        }
        File::deleteDirectory(storage_path('/app/livewire-tmp'));


        session()->flash('message', 'Annuncio inserito con successo!');
        $this->reset();
    }



    public function render()
    {
        return view('livewire.announcement-form');
    }
}
