<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class AnnouncementForm extends Component
{
    public $title;
    public $subtitle;
    public $body;
    public $price;
    public $img;

    public function render()
    {
        return view('livewire.announcement-form');
    }

    public function save()
    {
        Announcement::create([

            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
            // 'img' => $this->img,

        ]);

        $this->reset();
    }
}
