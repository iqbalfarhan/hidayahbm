<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $selected;

    protected $listeners = [
        'reload' => 'reload'
    ];

    public function reload()
    {
        $this->fetchData();
        $this->selected = "";
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function fetchData()
    {
        $this->datas = Barang::all();
    }

    public function edit($barang_id)
    {
        $this->emit('selected', $barang_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'editBarang']);
    }

    public function transaksi($barang_id)
    {
        $this->emit('selected', $barang_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'transaksiBarang']);
    }

    public function riwayat($barang_id)
    {
        $this->emit('selected', $barang_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'riwayatBarang']);
    }

    public function delete($barang_id)
    {
        $this->emit('selected', $barang_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteBarang']);
    }

    public function render()
    {
        return view('livewire.barang.index');
    }
}
