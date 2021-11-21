<?php

namespace App\Http\Livewire\Finance\Transaksi;

use App\Transaksi;
use Livewire\Component;

class Create extends Component
{
    public $nominal;
    public $pemasukan_id;
    public $pinjaman_id;
    public $keterangan;
    public $jenis;
    public $tanggal;

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
        $this->jenis = 'masuk';
    }

    public function simpan()
    {
        $validate = $this->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
            'jenis' => 'required',
            'tanggal' => 'required',
            'pinjaman_id' => '',
            'pemasukan_id' => '',
        ]);

        Transaksi::create($validate);

        $this->emit('reload');
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createTransaksi']);
    }

    public function render()
    {
        return view('livewire.finance.transaksi.create');
    }
}
