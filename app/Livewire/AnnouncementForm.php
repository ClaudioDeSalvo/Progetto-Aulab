<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementForm extends Component
{
    public $title;
    public $subtitle;
    public $body;
    public $price;
    public $img;

    public $category_id = [];

    public function save()
    {

        Announcement::create([

            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
            'category_id' => $this->category_id,
            // 'img' => $this->img,

        ]);

        $this->reset();
        session()->flash('status', 'Annuncio inserito con successo!');
    }

    public function render()
    {
        return view('livewire.announcement-form');
    }
}
