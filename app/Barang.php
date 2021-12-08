<?php

namespace App;

use App\User;
use App\Tranbarang;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'keterangan', 'satuan', 'sku', 'photo', 'min_stok'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $appends = ['stok', 'gambar', 'status_stok_color', 'status_stok'];

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

    public function riwayat()
    {
        return Tranbarang::where('barang_id', $this->id)->latest()->get()->take(10);
    }

    public function getStatusStokColorAttribute()
    {
        if ($this->getStatusStokAttribute() == "habis") {
            return "danger";
        }
        elseif ($this->getStatusStokAttribute() == "kurang") {
            return "warning";
        }
        else{
            return "info";
        }
    }

    public function getStatusStokAttribute()
    {
        if($this->getStokAttribute() == 0){
            return "habis";
        }
        elseif ($this->getStokAttribute() <= $this->min_stok) {
            return "kurang";
        }
        else{
            return "aman";
        }
    }
}
