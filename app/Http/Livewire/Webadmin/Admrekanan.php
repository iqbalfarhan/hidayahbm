<?php

namespace App\Http\Livewire\Webadmin;

use App\Rekanan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admrekanan extends Component
{
    use WithFileUploads;
    
    public $datas;
    public $selected;
    public $no = 1;

    public $nama;
    public $photo;

    public $ednama;
    public $edphoto;

    public function mount()
    {
        $this->datas = Rekanan::all();
    }

    public function edit($id)
    {
        $rekanan = Rekanan::find($id);
        $this->selected = $id;
        $this->ednama = $rekanan->nama;
        $this->edphoto = $rekanan->photo;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editRekanan']);
    }

    public function delete($id)
    {
        $this->selected = Rekanan::find($id)->toArray();
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteRekanan']);
    }

    public function updateRekanan($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edphoto' => 'required',
        ]);

        Rekanan::find($id)->update([
            'nama' => $this->ednama,
            'photo' => $this->edphoto,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editRekanan']);
        $this->reset([
            'selected',
            'ednama',
            'edphoto',
        ]);
    }

    public function deleteRekanan($id)
    {
        Rekanan::find($id)->delete();

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteRekanan']);
        $this->reset('selected');
    }

    public function submit()
    {
        $val = $this->validate([
            'nama' => 'required',
            'photo' => 'required',
        ]);
        Rekanan::create($val);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createRekanan']);
        $this->reset([
            'nama',
            'photo',
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admrekanan');
    }
}
