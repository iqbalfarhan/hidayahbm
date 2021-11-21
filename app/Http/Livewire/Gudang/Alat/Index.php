<?php

namespace App\Http\Livewire\Gudang\Alat;

use App\Alat;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $no = 1;
    public $listeners = ['reload'];

    public function reload()
    {
        $this->fetchData();
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function fetchData()
    {
        $this->datas = Alat::all();
    }

    public function edit($alat_id)
    {
        $this->emit('selected', $alat_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'editAlat']);
    }

    public function hapus($alat_id)
    {
        $this->emit('selected', $alat_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteAlat']);
    }

    public function render()
    {
        return view('livewire.gudang.alat.index');
    }
}
