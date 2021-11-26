<?php

namespace App\Http\Livewire\Webadmin;

use App\Layanan;
use Livewire\Component;

class Admlayanan extends Component
{
    public $datas;
    public $selected;
    public $no = 1;

    public $nama;
    public $keterangan;
    public $icon;

    public $ednama;
    public $edketerangan;
    public $edicon;

    public function mount()
    {
        $this->datas = Layanan::all();
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);

        $this->selected = $id;
        $this->ednama = $layanan->nama;
        $this->edketerangan = $layanan->keterangan;
        $this->edicon = $layanan->icon;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editLayanan']);
    }

    public function delete($id)
    {
        $this->selected = $id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteLayanan']);
    }

    public function updateLayanan($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edketerangan' => 'required',
            'edicon' => 'required',
        ]);

        Layanan::find($id)->update([
            'nama' => $this->ednama,
            'keterangan' => $this->edketerangan,
            'icon' => $this->edicon,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editLayanan']);
        $this->reset([
            'selected',
            'ednama',
            'edketerangan',
            'edicon',
        ]);
    }

    public function deleteLayanan($id)
    {
        Layanan::find($id)->delete();

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteLayanan']);
        $this->reset('selected');
    }

    public function submit()
    {
        $val = $this->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'icon' => 'required',
        ]);
        Layanan::create($val);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
        $this->reset([
            'nama',
            'keterangan',
            'icon',
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admlayanan');
    }
}
