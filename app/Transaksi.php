<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'jenis',
        'tanggal',
        'nominal',
        'pemasukan_id',
        'pengeluaran_id',
        'pinjaman_id',
        'keterangan',
    ];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
