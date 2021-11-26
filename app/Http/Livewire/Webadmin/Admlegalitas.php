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
    public $selected;
    public $existPhoto;

    public $nama;
    public $namafile;
    public $tampil;

    public $ednama;
    public $ednamafile;
    public $edtampil;

    public function mount()
    {
        $this->files = Storage::allFiles();
        $this->datas = Legalitas::all();
    }

    public function simpanLegalitas()
    {
        $this->validate([
            'nama' => 'required',
            'namafile' => '',
            'tampil' => '',
        ]);

        $legal = Legalitas::create([
            'nama' => $this->nama,
            'namafile' => 'xxx',
            'tampil' => $this->tampil ? 1 : 0,
        ]);

        if ($this->namafile) {
            $filename = $this->namafile->getClientOriginalName();
            $this->namafile->storeAs('legalitas', $filename);

            Legalitas::find($legal->id)->update([
                'namafile' => '/storage/legalitas/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            Legalitas::find($legal->id)->update([
                'namafile' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->reset([
            'selected',
            'nama',
            'namafile',
            'tampil',
            'existPhoto'
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
    }

    public function edit($legalitas_id)
    {
        $legal = Legalitas::find($legalitas_id);
        $this->ednama = $legal->nama;
        $this->gambar = $legal->gambar;
        $this->edtampil = $legal->tampil;

        $this->selected = $legalitas_id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editLegalitas']);
    }

    public function updateLegalitas()
    {
        $legal = Legalitas::find($this->selected);

        $legal->update([
            'nama' => $this->ednama,
            'tampil' => $this->edtampil ? 1 : 0,
        ]);

        if ($this->ednamafile) {
            $filename = $this->ednamafile->getClientOriginalName();
            $this->ednamafile->storeAs('legalitas', $filename);

            $legal->update([
                'namafile' => '/storage/legalitas/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            $legal->update([
                'namafile' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->reset([
            'selected',
            'ednama',
            'ednamafile',
            'edtampil',
            'existPhoto'
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editLegalitas']);
    }

    public function delete($legalitas_id)
    {
        $legal = Legalitas::find($legalitas_id)->first();
        Storage::delete($legal->namafile);
        $legal->delete();

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteLegalitas']);
        $this->reset('selected');
    }

    public function deleteLegalitas($legalitas_id)
    {
        $this->selected = $legalitas_id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteLegalitas']);
    }

    public function render()
    {
        return view('livewire.webadmin.admlegalitas');
    }
}
