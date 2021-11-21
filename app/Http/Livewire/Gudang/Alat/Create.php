<?php

namespace App\Http\Livewire\Gudang\Alat;

use App\Alat;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $jumlah;
    public $kode;

    public function mount()
    {
        $this->kode = "HBM".time();
    }

    public function submit()
    {
        $validate = $this->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'kode' => 'required',
        ]);

        Alat::create($validate);

        $this->reset();
        $this->kode = "HBM".time();

        $this->dispatchBrowserEvent('closeModal', ['id' => 'createAlat']);
        $this->emit('reload');
    }

    public function edit($alat_id)
    {
        $this->emit('selected', $alat_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'editAlat']);
    }

    public function render()
    {
        return view('livewire.gudang.alat.create');
    }
}
