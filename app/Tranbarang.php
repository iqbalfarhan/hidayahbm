<?php

namespace App;

use App\User;
use App\Barang;
use Illuminate\Database\Eloquent\Model;

class Tranbarang extends Model
{
    protected $fillable = [
        'tanggal',
        'user_id',
        'barang_id',
        'jumlah',
        'jenis',
        'eviden',
        'keterangan'
    ];

    public function barang()
    {
        return Barang::find($this->barang_id);
    }

    public function user()
    {
        return User::find($this->user_id);
    }
}
