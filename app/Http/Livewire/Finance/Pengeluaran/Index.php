<?php

namespace App\Http\Livewire\Finance\Pengeluaran;

use App\Pengeluaran;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $listeners = [
        'reload' => 'reload'
    ];

    public function reload()
    {
        $this->mount();
    }

    public function mount()
    {
        $this->datas = Pengeluaran::latest()->get();
    }

    public function render()
    {
        return view('livewire.finance.pengeluaran.index');
    }
}
