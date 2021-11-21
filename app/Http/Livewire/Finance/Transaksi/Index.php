<?php

namespace App\Http\Livewire\Finance\Transaksi;

use App\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $selected;

    public $listeners = [
        'reload' => 'reload'
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
        $this->datas = Transaksi::all();
    }

    public function edit($transaksi_id)
    {
        $this->emit('selected', $transaksi_id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'editTransaksi']);
    }

    public function render()
    {
        return view('livewire.finance.transaksi.index');
    }
}
