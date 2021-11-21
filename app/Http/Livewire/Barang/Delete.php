<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use App\Tranbarang;
use Livewire\Component;

class Delete extends Component
{
    public $barang;
    public $barang_id;

    public $listeners = [
        'selected' => 'selected'
    ];

    public function selected($barang_id)
    {
        $this->barang = Barang::find($barang_id);
        $this->barang_id = $barang_id;
    }

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteBarang']);
    }

    public function hapus()
    {
        Barang::find($this->barang_id)->delete();
        Tranbarang::where('barang_id', $this->barang_id)->delete();

        $this->emit('reload');
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteBarang']);
    }

    public function render()
    {
        return view('livewire.barang.delete');
    }
}
