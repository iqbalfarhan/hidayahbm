<?php

namespace App\Http\Livewire\Gudang\Alat;

use App\Alat;
use Livewire\Component;

class Delete extends Component
{
    public $alat_id;
    public $alat;

    public $listeners = [
        'selected' => 'selected'
    ];

    public function selected($alat_id)
    {
        $this->alat_id = $alat_id;
        $this->alat = Alat::find($alat_id);
    }

    public function hapus()
    {
        Alat::find($this->alat_id)->delete();

        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteAlat']);
        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.gudang.alat.delete');
    }
}
