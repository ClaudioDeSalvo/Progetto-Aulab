<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use Livewire\Attributes\Validate;


class AnnouncementForm extends Component
{


    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:5')]
    public $subtitle;
    #[Validate('required|min:15')]
    public $body;




        protected $messages = [
        'title.min' => 'Il titolo e troppo corto',
        'subtitle.min' => 'Il sottotitolo e troppo corto',
        'body.min' => 'Il corpo e troppo corto',
        'price' => 'Il prezzo e troppo basso',
    ];

    public function updated($propertyName){
    $this->validateOnly($propertyName);
    }



   // public $category_id = [];

    public function save()
    {
        $this->validate();
        Announcement::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
            'category_id' => $this->category_id,
            //'img'=>$this->img->has('img') ? $this->file('img')->store('/public/img') : '/img/annunciodefault.jpg',

        ]);

        $this->reset();
        session()->flash('message', 'Annuncio inserito con successo!');
    }

    public function render()
    {
        return view('livewire.announcement-form');
    }
}
