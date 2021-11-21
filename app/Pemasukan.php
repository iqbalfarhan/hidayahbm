<?php

namespace App;

use App\Transaksi;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $fillable = [
        'kode',
        'tanggal',
        'keterangan',
        'nominal',
        'jenis',
        'user_id',
    ];

    protected $appends = ['status', 'terbayar'];

    public function transaksi()
    {
        return Transaksi::where('pemasukan_id', $this->id)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute()
    {
        $transaksi = $this->getTerbayarAttribute();
        if ($transaksi < $this->nominal) {
            return "blm lunas";
        }
        elseif ($transaksi > $this->nominal) {
            return "kelebihan";
        }
        else{
            return "lunas";
        }
    }

    public function getTerbayarAttribute()
    {
        $masuk = Transaksi::where('pemasukan_id', $this->id)->where('jenis', 'masuk')->sum('nominal');
        $keluar = Transaksi::where('pemasukan_id', $this->id)->where('jenis', 'keluar')->sum('nominal');

        return $masuk - $keluar;
    }

}
