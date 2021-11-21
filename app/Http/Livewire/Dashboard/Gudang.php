<?php

namespace App\Http\Livewire\Dashboard;

use DNS1D;
use App\Barang;
use Livewire\Component;

class Gudang extends Component
{
    public $barangs;
    public $barang;
    public $sku;

    public function mount($value='')
    {
        $this->barangs = Barang::get();
    }

    public function updatedSku($sku)
    {
        $this->barang = Barang::where('sku', $sku)->first();
        $this->sku = "";
    }

    public function render()
    {
        return view('livewire.dashboard.gudang');
    }
}
