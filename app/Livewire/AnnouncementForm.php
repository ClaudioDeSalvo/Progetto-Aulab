<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

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
                $this->announcement->images()->create(['path' => $img->store('img', 'public')]);
            }
        } else {
            foreach ($this->imgs as $img) {
                $this->announcement->images()->create(['path' => $img->store('public/img/annunciodefault.jpg')]);
            }
        }
        //   $imgPath = $this->img ? $this->img->store('public/img') : 'img/annunciodefault.jpg';

        session()->flash('message', 'Annuncio inserito con successo!');
        $this->reset();
    }



    public function render()
    {
        return view('livewire.announcement-form');
    }
}