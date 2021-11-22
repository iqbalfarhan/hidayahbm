<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Kegiatan;
use Livewire\Component;

class Admkegiatan extends Component
{
    public $no = 1;
    public $datas;
    public $files;
    public $tags;

    public $judul;
    public $slug;
    public $photo;
    public $isi;
    public $tag;

    public function mount()
    {
        $this->files = Storage::allFiles();
        $this->datas = Kegiatan::all();
        $this->tags = Kegiatan::distinct('tag')->pluck('tag');

        $this->isi = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    }

    public function simpanKegiatan()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        Kegiatan::create([
            'judul' => $this->judul,
            'slug' => Str::slug($this->judul, "-"),
            'photo' => $this->photo ?? null,
            'isi' => $this->isi,
            'tag' => $this->tag,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createKegiatan']);
    }

    public function render()
    {
        return view('livewire.webadmin.admkegiatan');
    }
}
