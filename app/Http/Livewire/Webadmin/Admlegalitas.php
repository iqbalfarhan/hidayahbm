<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Legalitas;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admlegalitas extends Component
{
    use WithFileUploads; 

    public $no = 1;
    public $datas;
    public $files;

    public $nama;
    public $namafile;
    public $tampil;

    public function mount()
    {
        $this->files = Storage::allFiles();
        $this->datas = Legalitas::all();
    }

    public function simpanLegalitas()
    {
        $this->validate([
            'nama' => 'required',
            'namafile' => 'required',
            'tampil' => '',
        ]);

        $legal = Legalitas::create([
            'nama' => $this->nama,
            'namafile' => 'xxx',
            'tampil' => $this->tampil ? 1 : 0,
        ]);

        if ($this->namafile) {
            $namafile = $this->namafile->getClientOriginalName();
            $this->namafile->storeAs('legalitas', $namafile);

            $legal->update([
                'namafile' => '/storage/legalitas/'.$namafile
            ]);
        }

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createLegalitas']);
    }

    public function delete($legalitas_id)
    {
        $legal = Legalitas::find($legalitas_id)->first();
        Storage::delete($legal->namafile);
        $legal->delete();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.webadmin.admlegalitas');
    }
}
