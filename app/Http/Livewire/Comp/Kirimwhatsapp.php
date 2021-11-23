<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;

class Kirimwhatsapp extends Component
{
    public $name;
    public $subject;
    public $message;

    public function kirim()
    {
        $this->validate([
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $text = "Selamat siang, saya ".$this->name."%0a";
        $text .= "saya ingin bertanya perihal ".$this->subject."%0a%0a";
        $text .= $this->message;

        $url = "https://api.whatsapp.com/send?phone=".perusahaan('whatsapp')."&text=".$text;
        return redirect($url);
    }

    public function render()
    {
        return view('livewire.comp.kirimwhatsapp');
    }
}
