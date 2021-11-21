<?php

namespace App;

use App\Lembur;
use App\Bayarlain;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'telegram_id', 'admin', 'photo', 'namapendek'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['gambar'];

    public function getGambarAttribute()
    {
        return $this->photo ?? '/storage/noimage.jpg';
    }

    public function honorLembur($bulan)
    {
        return Lembur::where('status', 'APPROVED')->where('user_id', $this->id)->where('tanggal', 'like', "%$bulan%")->get()->sum('honor');
    }

    public function lembur($bulan)
    {
        return Lembur::where('status', 'APPROVED')->where('user_id', $this->id)->where('tanggal', 'like', "%$bulan%")->get();
    }

    public function bayarlain($bulan)
    {
        return Bayarlain::where('user_id', $this->id)->where('bulan', $bulan)->get();
    }
}
