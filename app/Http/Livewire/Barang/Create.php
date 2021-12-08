<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use App\Tranbarang;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $keterangan;
    public $satuan;
    public $min_stok;
    public $stok;
    public $sku;

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'keterangan' => '',
            'satuan' => 'required',
            'sku' => '',
        ]);

        $barang = Barang::create([
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'satuan' => $this->satuan,
            'min_stok' => $this->min_stok,
            'sku' => $this->sku,
        ]);

        if ($this->stok) {
            Tranbarang::create([
                'tanggal' => date('Y-m-d'),
                'user_id' => auth()->user()->id,
                'barang_id' => $barang->id,
                'jumlah' => $this->stok,
                'jenis' => 'tambah',
                'keterangan' => 'Stok awal bahan makanan',
            ]);
        }

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
