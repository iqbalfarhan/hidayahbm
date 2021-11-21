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

    public function mount()
    {
        $dir = Storage::directories();
        array_splice($dir, array_search("livewire-tmp", $dir ), 1);
        $this->dirs = $dir;
        $allfiles = Storage::allFiles();

        $this->files = collect(array_filter($allfiles, function($str){
            return strpos($str, "livewire-tmp/") !== 0 && $str != ".gitignore";
        }));
        
    }

    public function updatedFilterpath($path)
    {
        if ($path != "") {
            $this->files = Storage::allFiles($path);
        }
        else{
            $this->mount();
        }
    }

    public function hapusFile($filename)
    {
        Storage::delete($filename);
        $this->mount();
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
