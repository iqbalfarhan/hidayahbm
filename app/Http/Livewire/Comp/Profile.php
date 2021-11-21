<?php

namespace App\Http\Livewire\Comp;

use Image;
use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $username;
    public $password;
    public $newpass;
    public $telegram_id;
    public $photo;
    public $prev_photo;
    public $user_id;

    protected $rules = [
        'photo' => 'required|image|max:3096',
    ];

    public function mount()
    {
        $user = User::find(auth()->user()->id);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->password = $user->password;
        $this->prev_photo = $user->gambar;
        $this->telegram_id = $user->telegram_id;
        $this->user_id = $user->id;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$this->user_id,
            'telegram_id' => '',
            'password' => ''
        ]);

        User::find($this->user_id)->update([
            'name' => $this->name,
            'username' => $this->username,
            'telegram_id' => $this->telegram_id,
            'password' => $this->newpass != "" ? password_hash($this->newpass, PASSWORD_DEFAULT) : $this->password,

        ]);

        $this->emit('reload');
        $this->dispatchBrowserEvent('alert', ['message' => 'Berhasil ubah keterangan profile']);

    }

    public function updatePhoto()
    {
        $validate = $this->validateOnly('photo');

        $filename = $this->user_id.".jpg";

        $img = Image::make($this->photo);
        $img->fit(300, 300);
        $img->save("/var/www/ovtimys/storage/app/public/user/".$filename);

        User::find($this->user_id)->update([
            'photo' => "/storage/user/".$filename
        ]);

        $this->prev_photo = "/storage/user/".$filename;

        $this->emit('reload');
        $this->dispatchBrowserEvent('alert', ['message' => 'Berhasil ganti photo. gunakan Ctrl + F5 untuk refresh photo']);

        // return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.comp.profile');
    }
}
