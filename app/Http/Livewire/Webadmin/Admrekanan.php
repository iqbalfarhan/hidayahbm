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
    public $existPhoto;

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
        $this->gambar = $rekanan->gambar;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editRekanan']);
    }

    public function delete($id)
    {
        $this->selected = $id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteRekanan']);
    }

    public function updateRekanan($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
        ]);

        Rekanan::find($id)->update([
            'nama' => $this->ednama,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('rekanan', $filename);

            Rekanan::find($id)->update([
                'photo' => '/storage/rekanan/'.$filename
            ]);

            $this->reset('existPhoto');
        }

        if ($this->existPhoto) {
            Rekanan::find($id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

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
        ]);

        $create = Rekanan::create([
            'nama' => $this->nama,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('rekanan', $filename);

            Rekanan::find($create->id)->update([
                'photo' => '/storage/rekanan/'.$filename
            ]);

            $this->reset('existPhoto');
        }

        if ($this->existPhoto) {
            Rekanan::find($create->id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
        $this->reset([
            'nama',
            'photo',
            'existPhoto'
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admrekanan');
    }
}
