<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $fillable = [
        'tanggal',
        'keterangan',
        'nominal',
        'rencana_pengembalian',
    ];
}
