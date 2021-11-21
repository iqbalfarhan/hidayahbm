<?php

namespace App\Http\Livewire\Finance\Pemasukan;

use App\Pemasukan;
use App\Transaksi;
use Livewire\Component;

class Create extends Component
{
    public $tanggal;
    public $keterangan;
    public $nominal;
    public $jenis;
    public $dp;
    public $kode;
    public $user_id;

    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $this->tanggal = date('Y-m-d');
    }

    public function submit()
    {
        $validate = $this->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jenis' => 'required',
            'nominal' => 'required',
            'kode' => 'required',
            'user_id' => 'required',
        ]);

        $pemasukan = Pemasukan::create([
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'jenis' => $this->jenis,
            'nominal' => $this->nominal,
            'kode' => $this->kode,
            'user_id' => $this->user_id,
        ]);

        // dd($pemasukan->id);

        if ($this->jenis == "dp") {
            $keteranganTransaksi = "pembayaran dengan DP ".$this->dp;
            $this->addToTransaksi($pemasukan->id, $keteranganTransaksi, $this->dp);
        }
        elseif ($this->jenis == "lunas") {
            $keteranganTransaksi = "Pembayaran lunas";
            $this->addToTransaksi($pemasukan->id, $keteranganTransaksi, $this->nominal);
        }

        $this->emit('reload');
        $this->reset([
            'tanggal',
            'keterangan',
            'nominal',
            'jenis',
            'dp',
            'kode',
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createPemasukan']);
    }

    public function addToTransaksi($pemasukan_id, $keteranganTransaksi, $nominal)
    {
        Transaksi::create([
            'pemasukan_id' => $pemasukan_id,
            'user_id' => $this->user_id,
            'nominal' => $nominal,
            'jenis' => 'masuk',
            'keterangan' => $keteranganTransaksi,
            'tanggal' => $this->tanggal,
        ]);
    }

    public function genKode()
    {
        $this->kode = time();
    }

    public function render()
    {
        return view('livewire.finance.pemasukan.create');
    }
}
