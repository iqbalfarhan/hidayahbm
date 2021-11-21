<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekanan extends Model
{
    protected $fillable = [
        'nama',
        'photo',
    ];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }
}
