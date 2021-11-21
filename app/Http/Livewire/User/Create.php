<?php

namespace App\Http\Livewire\User;

use App\User;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $namapendek;
    public $username;
    public $password;
    public $telegram_id;
    public $admin;

    protected $rules = [
        'name' => 'required',
        'namapendek' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required',
        'admin' => 'required',
    ];

    public function mount()
    {
        $this->admin = 0;
    }

    public function store()
    {
        $validate = $this->validate();
        User::create([
            'name' => $this->name,
            'namapendek' => $this->namapendek,
            'username' => $this->username,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            'telegram_id' => $this->telegram_id,
            'admin' => $this->admin,
        ]);
        $this->emit('reload');

        $this->reset([
            'name',
            'namapendek',
            'username',
            'password',
            'telegram_id',
            'admin',
        ]);

        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
