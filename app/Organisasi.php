<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'telp',
        'photo'
    ];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }
}
