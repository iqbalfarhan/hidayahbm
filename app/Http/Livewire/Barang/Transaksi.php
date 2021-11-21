<?php

namespace App\Http\Livewire\Barang;

use App\Barang;
use App\Tranbarang;
use Livewire\Component;
use Livewire\WithFileUploads;

class Transaksi extends Component
{
    use WithFileUploads;

    public $barangs = [];
    public $sku;
    public $nonsku;
    public $listnonsku;
    public $keterangan;

    public $jenis = 'tambah';

    public $queryString = ['jenis'];

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    public function updatedNonsku($nonsku)
    {
        $this->listnonsku = Barang::where('nama', 'like', "%$nonsku%")->get();
    }

    public function addToList($barang_id)
    {
        $barang = Barang::find($barang_id);

        if ($barang) {
            $keys = count(array_keys(array_column($this->barangs, 'barang_id'), $barang_id));

            if ($keys == 0) {
                $this->barangs[$barang->id] = [
                    'barang_id' => $barang->id,
                    'nama' => $barang->nama,
                    'sku' => $barang->sku,
                    'keterangan' => $barang->keterangan,
                    'satuan' => $barang->satuan,
                    'stok' => $barang->stok,
                    'jumlah' => 1,
                ];
            }
        }

        $this->nonsku = "";
    }

    public function updatedSku($sku)
    {
        $barang = Barang::where('sku', $sku)->first();

        if ($barang) {
            // dd(array_column($this->barangs, 'sku'));
            $keys = count(array_keys(array_column($this->barangs, 'sku'), $sku));

            if ($keys == 0) {
                $this->barangs[$barang->id] = [
                    'barang_id' => $barang->id,
                    'nama' => $barang->nama,
                    'sku' => $barang->sku,
                    'keterangan' => $barang->keterangan,
                    'satuan' => $barang->satuan,
                    'stok' => $barang->stok,
                    'jumlah' => 1,
                ];
            }
            else{
                $this->addError('sku', 'Sku tersebut sudah di scan');
            }
        }

        $this->sku = "";
    }

    public function simpan()
    {
        $this->validate([
            'keterangan' => 'required'
        ]);
        foreach ($this->barangs as $key => $brg) {
            $data = [
                'tanggal' => $this->tanggal,
                'barang_id' => $brg['barang_id'],
                'user_id' => auth()->user()->id,
                'jumlah' => $brg['jumlah'],
                'jenis' => $this->jenis,
                'keterangan' => $this->keterangan
            ];
            Tranbarang::create($data);
        }

        // $this->emit('reload');
        // $this->dispatchBrowserEvent('closeModal', ['id' => 'transaksiBarang']);

        return redirect()->route('barang.index');
    }

    public function unset($key)
    {
        unset($this->barangs[$key]);
    }

    public function render()
    {
        return view('livewire.barang.transaksi');
    }
}
