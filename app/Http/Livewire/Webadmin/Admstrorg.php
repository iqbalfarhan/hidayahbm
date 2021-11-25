<?php

namespace App\Http\Livewire\Webadmin;

use App\Organisasi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admstrorg extends Component
{
    use WithFileUploads;

    public $datas;
    public $selected;
    public $existPhoto;
    public $no = 1;

    public $nama;
    public $jabatan;
    public $telp;
    public $photo;

    public $ednama;
    public $edjabatan;
    public $edtelp;
    public $edphoto;

    public function mount()
    {
        $this->datas = Organisasi::all();
    }

    public function edit($id)
    {
        $organisasi = Organisasi::find($id);
        $this->selected = $id;
        $this->ednama = $organisasi->nama;
        $this->edjabatan = $organisasi->jabatan;
        $this->edtelp = $organisasi->telp;
        $this->gambar = $organisasi->gambar;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editOrganisasi']);
    }

    public function delete($id)
    {
        $this->selected = Organisasi::find($id);
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteOrganisasi']);
    }

    public function updateOrganisasi($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edjabatan' => 'required',
            'edtelp' => 'required',
            'edphoto' => '',
        ]);

        Organisasi::find($id)->update([
            'nama' => $this->ednama,
            'jabatan' => $this->edjabatan,
            'telp' => $this->edtelp,
        ]);

        if ($this->edphoto) {
            $filename = $this->edphoto->getClientOriginalName();
            $this->edphoto->storeAs('strorg', $filename);

            Organisasi::find($id)->update([
                'photo' => '/storage/strorg/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            Organisasi::find($id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editOrganisasi']);
        $this->reset([
            'selected',
            'ednama',
            'edjabatan',
            'edtelp',
            'edphoto',
            'existPhoto',
        ]);
    }

    public function deleteOrganisasi($id)
    {
        Organisasi::find($id)->delete();

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteOrganisasi']);
        $this->reset('selected');
    }

    public function submit()
    {
        $this->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'image|max:2048',
            'telp' => 'required',
        ]);

        $create = Organisasi::create([
            'nama' => $this->nama,
            'jabatan' => $this->jabatan,
            'telp' => $this->telp,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('strorg', $filename);

            Organisasi::find($create->id)->update([
                'photo' => '/storage/strorg/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            Organisasi::find($create->id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
        $this->reset([
            'selected',
            'nama',
            'jabatan',
            'telp',
            'photo',
            'existPhoto',
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admstrorg');
    }
}
