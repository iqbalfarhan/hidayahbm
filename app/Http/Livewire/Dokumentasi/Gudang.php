<?php

namespace App\Http\Livewire\Dokumentasi;

use Livewire\Component;

class Gudang extends Component
{
    public $datas = [];

    public function mount()
    {
        $this->datas = [
            'Input bahan makanan awal',
            'Edit keterangan bahan makanan',
            'Hapus bahan makanan',
            'Tambah stok bahan makanan',
            'Permintaan pengurangan bahan makanan',


        ];
    }

    public function render()
    {
        return view('livewire.dokumentasi.gudang');
    }
}
