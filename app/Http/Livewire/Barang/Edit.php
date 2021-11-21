<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use Livewire\Component;

class Edit extends Component
{
    public $barang_id;

    public $nama;
    public $keterangan;
    public $satuan;
    public $sku;

    public $listeners = [
        'selected' => 'selected'
    ];

    public function selected($barang_id)
    {
        $barang = Barang::find($barang_id);

        $this->barang_id = $barang->id;
        $this->nama = $barang->nama;
        $this->keterangan = $barang->keterangan;
        $this->satuan = $barang->satuan;
        $this->sku = $barang->sku;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'keterangan' => '',
            'satuan' => 'required',
            'sku' => '',
        ]);

        Barang::find($this->barang_id)->update([
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'satuan' => $this->satuan,
            'sku' => $this->sku,
        ]);

        $this->emit('reload');
        $this->reset(['nama', 'keterangan', 'sku', 'satuan']);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editBarang']);
    }

    public function close()
    {
        $this->reset(['nama', 'keterangan', 'sku', 'satuan']);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editBarang']);
    }

    public function render()
    {
        return view('livewire.barang.edit');
    }
}
