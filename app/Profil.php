<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = ['slug', 'judul', 'isi', 'photo', 'tampil_di_home'];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/nobanner.jpg';
    }
}
