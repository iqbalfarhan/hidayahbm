<?php

namespace App\Http\Livewire\Dashboard;

use App\Perusahaan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Web extends Component
{
    use WithFileUploads;

    public $datas;
    public $params;
    public $logo;

    public $parameter;
    public $value;

    public $newparameter;
    public $newvalue;

    public function mount()
    {
        $this->datas = Perusahaan::all();
        $this->params = Perusahaan::where('parameter', '!=', 'logo')->get()->pluck('parameter');
    }

    public function updatedParameter($param)
    {
        $this->value = Perusahaan::where('parameter', $param)->first()->value;
    }

    public function submit()
    {
        $this->validate([
            'parameter' => 'required',
            'value' => 'required',
        ]);
        Perusahaan::where('parameter', $this->parameter)->update([
            'value' => $this->value
        ]);

        $this->mount();
        $this->reset([
            'parameter',
            'value',
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'editData']);
    }

    public function editparam($param)
    {
        $this->parameter = $param;
        $this->updatedParameter($param);
        $this->dispatchBrowserEvent('openModal', ['id' => 'editData']);
    }

    public function storeLogo()
    {
        $this->validate([
            'logo' => 'required|image'
        ]);

        $ext = $this->logo->extension();
        $filename = 'logo.'.$ext;
        $this->logo->storeAs('/', $filename);
        $this->mount();

        Perusahaan::updateOrCreate([
            'parameter' => 'logo'
        ], [
            'parameter' => 'logo',
            'value' => '/storage/'.$filename
        ]);

        $this->dispatchBrowserEvent('closeModal', ['id' => 'uploadPhoto']);
    }

    public function simpanData()
    {
        $this->validate([
            'newparameter' => 'required',
            'newvalue' => 'required',
        ]);

        Perusahaan::create([
            'parameter' => $this->newparameter,
            'value' => $this->newvalue
        ]);

        $this->mount();
        $this->reset([
            'newparameter',
            'newvalue',
        ]);
        $this->dispatchBrowserEvent('closeModal', ['id' => 'createData']);
    }

    public function render()
    {
        return view('livewire.dashboard.web');
    }
}
