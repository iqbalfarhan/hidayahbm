<?php

namespace App\Http\Livewire\Comp;

// use App\Lembur;
use Livewire\Component;

class NotivAdmin extends Component
{
    public $datas;

    public function mount()
    {
        // $this->datas = Lembur::where('status', 'WAITING')->get();
    }

    public function render()
    {
        return view('livewire.comp.notiv-admin');
    }
}
