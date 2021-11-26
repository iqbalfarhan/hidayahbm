<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Kegiatan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admkegiatan extends Component
{
    use WithFileUploads;

    public $no = 1;
    public $datas;
    public $tags;
    public $existPhoto;
    public $gambar;
    public $selected;

    public $judul;
    public $slug;
    public $photo;
    public $isi;
    public $tag;

    public function mount()
    {
        $this->datas = Kegiatan::all();
        $this->tags = Kegiatan::distinct('tag')->pluck('tag');
    }

    public function simpanKegiatan()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        $kegiatan = Kegiatan::create([
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul, "-"),
            'isi' => $this->isi,
            'tag' => $this->tag,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('kegiatan', $filename);

            Kegiatan::find($kegiatan->id)->update([
                'photo' => '/storage/kegiatan/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            Kegiatan::find($kegiatan->id)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->reset([
            'judul',
            'slug',
            'photo',
            'isi',
            'tag',
        ]);
        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'create']);
    }

    public function edit($kegiatan_id)
    {
        $this->selected = $kegiatan_id;

        $kegiatan = Kegiatan::find($kegiatan_id);

        $this->judul = $kegiatan->judul;
        $this->slug = $kegiatan->slug;
        $this->gambar = $kegiatan->gambar;
        $this->isi = $kegiatan->isi;
        $this->tag = $kegiatan->tag;

        $this->dispatchBrowserEvent('openModal', ['id' => 'editKegiatan']);
    }

    public function updateKegiatan()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        $kegiatan = Kegiatan::find($this->selected)->update([
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul, "-"),
            'isi' => $this->isi,
            'tag' => $this->tag,
        ]);

        if ($this->photo) {
            $filename = $this->photo->getClientOriginalName();
            $this->photo->storeAs('kegiatan', $filename);

            Kegiatan::find($this->selected)->update([
                'photo' => '/storage/kegiatan/'.$filename
            ]);
        }

        if ($this->existPhoto) {
            Kegiatan::find($this->selected)->update([
                'photo' => '/storage/'.$this->existPhoto
            ]);
        }

        $this->reset([
            'judul',
            'slug',
            'photo',
            'gambar',
            'isi',
            'tag',
        ]);
        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editKegiatan']);
    }

    public function delete($kegiatan_id)
    {
        $this->selected = $kegiatan_id;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteKegiatan']);
    }

    public function deleteKegiatan()
    {
        Kegiatan::find($this->selected)->delete();

        $this->reset([
            'selected'
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteKegiatan']);
    }

    public function render()
    {
        return view('livewire.webadmin.admkegiatan');
    }
}
