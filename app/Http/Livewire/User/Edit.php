<?php

namespace App\Http\Livewire\User;

use App\User;
use Livewire\Component;

class Edit extends Component
{
    public $user_id;

    public $user;
    public $name;
    public $namapendek;
    public $username;
    public $telegram_id;
    public $admin;

    public $listeners = [
        'editUser' => 'editUser'
    ];

    public function editUser($user_id)
    {
        $this->user_id = $user_id;
        $this->user = User::find($this->user_id);
        $this->name = $this->user->name;
        $this->namapendek = $this->user->namapendek;
        $this->username = $this->user->username;
        $this->telegram_id = $this->user->telegram_id;
        $this->admin = $this->user->admin;
    }

    public function update()
    {
        User::find($this->user_id)->update([
            'name' => $this->name,
            'namapendek' => $this->namapendek,
            'username' => $this->username,
            'telegram_id' => $this->telegram_id,
            'admin' => $this->admin,
        ]);

        $this->emit('reload');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function resetPassword()
    {
        User::find($this->user_id)->update([
            'password' => password_hash("password", PASSWORD_DEFAULT),
        ]);

        $this->emit('reload');
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('alert', ['message' => 'password user berhasil di reset. password user sekarang : password']);
    }

    public function closeModal()
    {
        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
