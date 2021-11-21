<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = [
        'tanggal',
        'keterangan',
        'nominal',
        'photo',
    ];
    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
