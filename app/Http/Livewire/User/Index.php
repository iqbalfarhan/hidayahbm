<?php

namespace App\Http\Livewire\User;

use App\User;
use Livewire\Component;

class Index extends Component
{
    public $datas;
    public $selected;

    public $listeners = [
        'reload'
    ];

    public function reload()
    {
        $this->mount();
        $this->reset('selected');
    }

    public function mount()
    {
        $this->datas = User::all();
    }

    public function delete($user_id)
    {
        User::find($user_id)->delete();
        $this->mount();
    }

    public function edit($user_id)
    {
        $this->dispatchBrowserEvent('openModal', ['id' => 'editUser']);
        $this->emit('editUser', $user_id);
    }

    public function render()
    {
        return view('livewire.user.index');
    }
}
