<?php

namespace App\Http\Livewire\Comp;

use Livewire\Component;

class Usernav extends Component
{
    public $user;
    public $listeners = [
        'reload'
    ];

    public function reload()
    {
        $this->mount();
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.comp.usernav');
    }
}
