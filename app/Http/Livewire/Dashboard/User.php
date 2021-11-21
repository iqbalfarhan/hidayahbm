<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class User extends Component
{
    public $honor;
    public $lembur;
    public $bulan;

    public $queryString = ['bulan'];
    protected $listeners = [
        'filterBulan' => 'filterBulan'
    ];

    public function filterBulan($bulan)
    {
        $this->bulan = $bulan;
        $this->fetchData();
    }

    public function mount()
    {
        $this->bulan = date('Y-m');
        $this->fetchData();
    }

    public function fetchData()
    {
        $this->honor = auth()->user()->honorLembur($this->bulan);
        $this->lembur = auth()->user()->lembur($this->bulan);
    }

    public function render()
    {
        return view('livewire.dashboard.user');
    }
}
