<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use Livewire\Component;

class Riwayat extends Component
{
    public $datas;
    public $no = 1;

    protected $listeners = [
        'selected' => 'selected'
    ];

    public function selected($barang_id)
    {
        $this->datas = Barang::find($barang_id)->riwayat();
    }

    public function close()
    {
        $this->reset('datas');
        $this->dispatchBrowserEvent('closeModal', ['id' => 'riwayatBarang']);
    }

    public function render()
    {
        return view('livewire.barang.riwayat');
    }
}
