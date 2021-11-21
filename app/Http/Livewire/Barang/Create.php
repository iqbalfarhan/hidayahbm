<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $keterangan;
    public $satuan;
    public $sku;

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'keterangan' => '',
            'satuan' => 'required',
            'sku' => '',
        ]);

        Barang::create([
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'satuan' => $this->satuan,
            'sku' => $this->sku,
        ]);

        $this->emit('reload');
        $this->reset(['nama', 'keterangan', 'sku', 'satuan']);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createBarang']);
    }

    public function close()
    {
        $this->reset(['nama', 'keterangan', 'sku', 'satuan']);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createBarang']);
    }

    public function render()
    {
        return view('livewire.barang.create');
    }
}
