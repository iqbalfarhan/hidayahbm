<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legalitas extends Model
{
    protected $fillable = [
        'nama',
        'namafile',
        'tampil',
    ];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->namafile ?? '/storage/nobanner.jpg';
    }
}
