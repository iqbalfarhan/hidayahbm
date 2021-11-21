<?php

namespace App\Http\Livewire\Webadmin;

use App\Organisasi;
use Livewire\Component;

class Admstrorg extends Component
{
    public $datas;
    public $selected;
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
        $this->edphoto = $organisasi->photo;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editOrganisasi']);
    }

    public function delete($id)
    {
        $this->selected = Organisasi::find($id)->toArray();
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteOrganisasi']);
    }

    public function updateOrganisasi($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edjabatan' => 'required',
            'edtelp' => 'required',
            'edphoto' => 'required',
        ]);

        Organisasi::find($id)->update([
            'nama' => $this->ednama,
            'jabatan' => $this->edjabatan,
            'telp' => $this->edtelp,
            'photo' => $this->edphoto,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editOrganisasi']);
        $this->reset([
            'selected',
            'ednama',
            'edjabatan',
            'edtelp',
            'edphoto',
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
        $val = $this->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'required',
            'telp' => 'required',
        ]);
        Organisasi::create($val);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createOrganisasi']);
        $this->reset([
            'nama',
            'jabatan',
            'photo',
            'telp',
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admstrorg');
    }
}
