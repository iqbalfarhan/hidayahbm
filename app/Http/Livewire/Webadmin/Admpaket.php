<?php

namespace App\Http\Livewire\Webadmin;

use App\Paket;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admpaket extends Component
{
    use WithFileUploads;
    
    public $datas;
    public $selected;
    public $no = 1;
    public $existPhoto;

    public $nama;
    public $list_menu;
    public $photo;
    public $harga;
    public $keterangan;
    public $terlaris;

    public $ednama;
    public $edlist_menu;
    public $edphoto;
    public $edharga;
    public $edketerangan;
    public $edterlaris;

    public function mount()
    {
        $this->datas = Paket::all();
    }

    public function edit($id)
    {
        $paket = Paket::find($id);
        $this->selected = $id;
        $this->ednama = $paket->nama;
        $this->edlist_menu = implode("\n", json_decode($paket->list_menu));
        $this->gambar = $paket->gambar;
        $this->edharga = $paket->harga;
        $this->edketerangan = $paket->keterangan;
        $this->edterlaris = $paket->terlaris;

        $this->dispatchBrowserEvent('openModal', ['id' => 'editPaket']);
    }

    public function delete($id)
    {
        $this->selected = $id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deletePaket']);
    }

    public function updatePaket($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edlist_menu' => 'required',
            'edharga' => '',
            'edketerangan' => '',
            'edterlaris' => '',
        ]);

        $list_menu_dep = explode("\n", str_replace("\r", "", $this->edlist_menu));

        Paket::find($id)->update([
            'nama' => $this->ednama,
            'list_menu' => json_encode($list_menu_dep),
            'harga' => $this->edharga,
            'keterangan' => $this->edketerangan,
            'terlaris' => $this->edterlaris ? 1 : 0,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('paket', $filename);

            Paket::find($id)->update([
                'photo' => '/storage/paket/'.$filename
            ]);

            $this->reset('existPhoto');
        }

        if ($this->existPhoto) {
            Paket::find($id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editPaket']);
        $this->reset([
            'selected',
            'ednama',
            'edlist_menu',
            'photo',
            'edharga',
            'edketerangan',
            'edterlaris',
        ]);
    }

    public function deletePaket($id)
    {
        Paket::find($id)->delete();

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deletePaket']);
        $this->reset('selected');
    }

    public function submit()
    {
        $val = $this->validate([
            'nama' => 'required',
            'list_menu' => 'required',
            'photo' => '',
            'harga' => '',
            'keterangan' => '',
            'terlaris' => '',
        ]);

        $list_menu_dep = explode("\n", str_replace("\r", "", $this->list_menu));

        $paket = Paket::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama, '-'),
            'list_menu' => json_encode($list_menu_dep),
            'harga' => $this->harga,
            'keterangan' => $this->keterangan,
            'terlaris' => $this->terlaris ? 1 : 0,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('paket', $filename);

            Paket::find($paket->id)->update([
                'photo' => '/storage/paket/'.$filename
            ]);

            $this->reset('existPhoto');
        }

        if ($this->existPhoto) {
            Paket::find($paket->id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->mount();
        $this->reset([
            'nama',
            'list_menu',
            'photo',
            'harga',
            'keterangan',
            'terlaris',
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
    }

    public function render()
    {
        return view('livewire.webadmin.admpaket');
    }
}
