<?php

namespace App\Http\Livewire\Finance\Pengeluaran;

use App\Transaksi;
use App\Pengeluaran;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $tanggal;
    public $keterangan;
    public $nominal;
    public $photo;

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    public function submit()
    {
        $validate = $this->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
            'photo' => '',
        ]);

        $pengeluaran = Pengeluaran::create($validate);
        $this->addToTransaksi($pengeluaran->id);

        $this->emit('reload');
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createPengeluaran']);
    }

    public function addToTransaksi($pengeluaran_id)
    {
        Transaksi::create([
            'pengeluaran_id' => $pengeluaran_id,
            'keterangan' => $this->keterangan,
            'tanggal' => $this->tanggal,
            'nominal' => $this->nominal,
            'jenis' => 'keluar',
        ]);
    }

    public function render()
    {
        return view('livewire.finance.pengeluaran.create');
    }
}
