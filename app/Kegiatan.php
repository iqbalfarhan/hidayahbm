<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'photo',
        'isi',
        'tag',
    ];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }
}
