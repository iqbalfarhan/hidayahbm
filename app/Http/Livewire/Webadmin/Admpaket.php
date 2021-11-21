<?php

namespace App\Http\Livewire\Webadmin;

use App\Paket;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admpaket extends Component
{
    use WithFileUploads;
    
    public $datas;
    public $selected;
    public $no = 1;

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
        $this->edphoto = $paket->photo;
        $this->edharga = $paket->harga;
        $this->edketerangan = $paket->keterangan;
        $this->edterlaris = $paket->terlaris;
        $this->dispatchBrowserEvent('openModal', ['id' => 'editPaket']);
    }

    public function delete($id)
    {
        $this->selected = Paket::find($id)->toArray();
        $this->dispatchBrowserEvent('openModal', ['id' => 'deletePaket']);
    }

    public function updatePaket($id)
    {
        $val = $this->validate([
            'ednama' => 'required',
            'edlist_menu' => 'required',
            'edphoto' => '',
            'edharga' => '',
            'edketerangan' => '',
            'edterlaris' => '',
        ]);

        $list_menu_dep = explode("\n", str_replace("\r", "", $this->edlist_menu));

        Paket::find($id)->update([
            'nama' => $this->ednama,
            'list_menu' => json_encode($list_menu_dep),
            'photo' => $this->edphoto,
            'harga' => $this->edharga,
            'keterangan' => $this->edketerangan,
            'terlaris' => $this->edterlaris ? 1 : 0,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editPaket']);
        $this->reset([
            'selected',
            'ednama',
            'edlist_menu',
            'edphoto',
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

        Paket::create([
            'nama' => $this->nama,
            'list_menu' => json_encode($list_menu_dep),
            'photo' => $this->photo,
            'harga' => $this->harga,
            'keterangan' => $this->keterangan,
            'terlaris' => $this->terlaris ? 1 : 0,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createPaket']);
        $this->reset([
            'nama',
            'list_menu',
            'photo',
            'harga',
            'keterangan',
            'terlaris',
        ]);
    }

    public function render()
    {
        return view('livewire.webadmin.admpaket');
    }
}
