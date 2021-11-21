<?php

namespace App\Http\Livewire\Gudang\Transaksi;

use App\Tranbarang;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $tanggal;
    public $queryString = ['tanggal'];

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
        $this->fetchData();
    }

    public function fetchData()
    {
        $this->datas = Tranbarang::latest()->where('tanggal', $this->tanggal)->get();
    }

    public function filterTanggal()
    {
        $this->fetchData();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'filterTanggal']);
    }

    public function nextDay()
    {
        $this->tanggal = date('Y-m-d', strtotime($this->tanggal . ' +1 day'));
        $this->fetchData();
    }

    public function prevDay()
    {
        $this->tanggal = date('Y-m-d', strtotime($this->tanggal . ' -1 day'));
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.gudang.transaksi.index');
    }
}
