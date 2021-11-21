<?php

namespace App\Http\Livewire\Gudang\Alat;

use App\Alat;
use Livewire\Component;

class Edit extends Component
{
    public $alat_id;

    public $nama;
    public $jumlah;
    public $kode;

    public $listeners = [
        'selected' => 'selected'
    ];

    public function selected($alat_id)
    {
        $this->alat_id = $alat_id;
        $alat = Alat::find($alat_id);

        $this->nama = $alat->nama;
        $this->jumlah = $alat->jumlah;
        $this->kode = $alat->kode;
    }

    public function submit()
    {
        $validate = $this->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'kode' => 'required',
        ]);

        Alat::find($this->alat_id)->update($validate);

        $this->dispatchBrowserEvent('closeModal', ['id' => 'editAlat']);
        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.gudang.alat.edit');
    }
}
