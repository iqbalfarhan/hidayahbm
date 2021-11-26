<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'list_menu',
        'photo',
        'harga',
        'keterangan',
        'terlaris'
    ];

    protected $appends = ['gambar', 'price'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }

    public function getPriceAttribute()
    {
        if ($this->harga) {
            return textNumber($this->harga);
        }
        else{
            return null;
        }
    }
}
