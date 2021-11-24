<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Profil;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admprofil extends Component
{
    use WithFileUploads;

    public $allowAdd = true;
    public $files;
    public $existPhoto;
    public $newphoto;
    public $gambar;

    public $judul;
    public $isi;
    public $slug;
    public $photo;
    public $tampil_di_home;

    public $datas;
    public $newslug;
    public $newjudul;

    public $queryString = ['slug', 'allowAdd'];

    public function mount()
    {
        $this->files = Storage::allFiles();
        $this->datas = Profil::all();
        $this->slug = $this->slug ?? "tentang-perusahaan";
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
        Profil::create([
            'judul' => $this->newjudul,
            'slug' => $this->newslug,
        ]);
        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createProfil']);
    }

    public function updatedSlug($slug)
    {
        $data = Profil::where('slug', $slug)->first();
        if ($data) {
            $this->judul = $data->judul;
            $this->isi = $data->isi;
            $this->photo = $data->photo;
            $this->gambar = $data->gambar;
            $this->tampil_di_home = $data->tampil_di_home;
            $this->reset('newphoto');
            $this->reset('existPhoto');
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
        ]);

        if ($this->tampil_di_home) {
            Profil::where('tampil_di_home', 1)->update([
                'tampil_di_home' => 0
            ]);

            Profil::where("slug", $this->slug)->update([
                'tampil_di_home' => 1
            ]);
        }

        if ($this->existPhoto) {
            Profil::where('slug', $this->slug)->update([
                'photo' => '/storage/'.$this->existPhoto,
            ]);
        }

        if ($this->newphoto) {
            $newphoto = $this->newphoto->getClientOriginalName();
            $this->newphoto->storeAs('profil', $newphoto);

            Profil::where('slug', $this->slug)->update([
                'photo' => '/storage/profil/'.$newphoto,
            ]);
        }

        Profil::where('slug', $this->slug)->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'slug' => $this->slug,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editProfil']);
    }

    public function updatedPhoto($photo)
    {
        $this->existPhoto = "";
    }

    public function delete()
    {
        Profil::where('slug', $this->slug)->delete();
        $this->reset('slug');
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editProfil']);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.webadmin.admprofil');
    }
}
