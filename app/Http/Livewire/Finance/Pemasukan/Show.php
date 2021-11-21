<?php

namespace App\Http\Livewire\Finance\Pemasukan;

use App\Pemasukan;
use Livewire\Component;

class Show extends Component
{
    public $data;
    public $listeners = [
        'reload'
    ];

    public function reload()
    {
        $this->mount();
    }

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.finance.pemasukan.show');
    }
}
