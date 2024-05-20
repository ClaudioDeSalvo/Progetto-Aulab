<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Announcement;

class AnnouncementForm extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $body;
    public $category_id;
    public $img;

    protected $rules = [
        'title' => 'required|min:5',
        'subtitle' => 'required|min:5',
        'price' => 'required|numeric|min:1',
        'body' => 'required|min:15',
        'category_id' => 'required|exists:categories,id',
        'img' => 'nullable|image|max:1024', // Limit image size to 1MB
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
        'img.image' => "Il file deve essere un'immagine",
        'img.max' => "L'immagine non deve superare 1MB",
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        $this->validate();

        $imgPath = $this->img ? $this->img->store('public/img') : 'img/annunciodefault.jpg';

        Announcement::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'price' => $this->price,
            'body' => $this->body,
            'user_id' => auth()->id(),
            'category_id' => $this->category_id,
            'img' => $imgPath,
        ]);

        $this->reset();
        session()->flash('message', 'Annuncio inserito con successo!');
    }

    public function render()
    {
        return view('livewire.announcement-form');
    }
}