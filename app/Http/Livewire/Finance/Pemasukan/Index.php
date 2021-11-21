<?php

namespace App\Http\Livewire\Finance\Pemasukan;

use App\Pemasukan;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $listeners = [
        'reload'
    ];

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
        $this->datas = Pemasukan::all();
    }

    public function render()
    {
        return view('livewire.finance.pemasukan.index');
    }
}
