<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $no = 1;
    public $status;
    public $selected;
    public $filter = false;

    protected $listeners = [
        'reload' => 'reload'
    ];

    public $queryString = [
        'status'
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
        $this->status = $this->status ?? null;
        $this->datas = Barang::all();

        if ($this->status) {
            $this->datas = $this->datas->where('status_stok', $this->status);
        }

    }

    public function updatedStatus($status)
    {
        $this->fetchData();
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
