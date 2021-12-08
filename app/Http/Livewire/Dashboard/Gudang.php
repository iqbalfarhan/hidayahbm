<?php

namespace App\Http\Livewire\Dashboard;

use App\Barang;
use Livewire\Component;

class Gudang extends Component
{
    public $barangs;

    public function mount($value='')
    {
        $this->barangs = Barang::get();
    }

    public function render()
    {
        return view('livewire.dashboard.gudang');
    }
}
