<?php

namespace App;

use App\User;
use App\Tranbarang;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'keterangan', 'satuan', 'sku', 'photo'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $appends = ['stok', 'gambar'];

    public function getStokAttribute()
    {
        $tambah = Tranbarang::where('barang_id', $this->id)->where('jenis', 'tambah')->get()->sum('jumlah');
        $kurang = Tranbarang::where('barang_id', $this->id)->where('jenis', 'kurang')->get()->sum('jumlah');

        return $tambah - $kurang;
    }

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }

    public function www($arg)
    {
        return $arg == 2 ? "dua" : "bukan dua";
    }

    public function riwayat()
    {
        return Tranbarang::orderBy('tanggal', 'DESC')->where('barang_id', $this->id)->get();
    }
}
