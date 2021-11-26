<?php

namespace App\Http\Livewire\Webadmin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admgaleri extends Component
{
    use WithFileUploads;

    public $files;
    public $filterpath;

    public $path;
    public $dirs;
    public $filename;

    public $selectedFile;

    public $queryString = [
        'path',
        'selectedFile'
    ];

    public function mount()
    {
        $this->path = $this->path ?? "";

        $dir = Storage::directories();
        array_splice($dir, array_search("livewire-tmp", $dir ), 1);
        $this->dirs = $dir;

        $allfiles = Storage::files($this->path);
        $this->files = collect(array_filter($allfiles, function($str){
            return strpos($str, "livewire-tmp/") !== 0 && $str != ".gitignore";
        }));
        
    }

    public function updatedPath($path)
    {
        $this->mount();
    }

    public function updatedFilterpath($path)
    {
        $this->path = $path;
        $this->mount();
    }

    public function selectFile($file)
    {
        $this->selectedFile = $file;
        $this->dispatchBrowserEvent('openModal', ['id' => 'deleteFile']);
    }

    public function hapusFile($filename)
    {
        Storage::delete($filename);
        $this->mount();
        $this->dispatchBrowserEvent('closeModal', ['id' => 'deleteFile']);
        $this->unsetSelectedFile();
    }

    public function unsetSelectedFile()
    {
        $this->reset('selectedFile');
    }

    public function storeFile()
    {
        $this->validate([
            'filename' => 'required|image'
        ]);

        $filename = $this->filename->getClientOriginalName();
        $this->filename->storeAs($this->path, $filename);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.webadmin.admgaleri');
    }
}
