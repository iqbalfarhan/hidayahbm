<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Profil;
use Livewire\Component;

class Admprofil extends Component
{
    public $allowAdd = true;
    public $files;

    public $judul;
    public $isi;
    public $slug;
    public $photo;


    public $datas;
    public $newslug;
    public $newjudul;

    public $queryString = ['slug', 'allowAdd'];

    public function mount()
    {
        $this->files = Storage::allFiles();
        $this->datas = Profil::all();
        $this->slug = $this->slug ?? "pengantar";
        $this->updatedSlug($this->slug);
    }

    public function updatedNewjudul($judul)
    {
        $this->newslug = Str::slug($judul, "-");
    }

    public function addNewSlug()
    {
        $this->slug = $this->newslug;
        $this->updatedSlug($this->slug);
        $this->judul = $this->newjudul;
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createProfil']);
    }

    public function updatedSlug($slug)
    {
        $data = Profil::where('slug', $slug)->first();
        if ($data) {
            $this->judul = $data->judul;
            $this->isi = $data->isi;
            $this->photo = $data->photo;
        }
        else{
            $this->judul = "";
            $this->isi = "";
            $this->photo = "";
        }
    }

    public function update()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'slug' => 'required',
            'photo' => '',
        ]);

        Profil::updateOrCreate([
            'slug' => $this->slug
        ],[
            'judul' => $this->judul,
            'isi' => $this->isi,
            'slug' => $this->slug,
        ]);
        $this->dispatchBrowserEvent('alert', ['message' => 'berhasil disimpan']);

        $this->mount();
    }

    public function render()
    {
        return view('livewire.webadmin.admprofil');
    }
}
