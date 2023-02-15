<?php

namespace App\Models\User;

use App\Models\Binaan\Administrasi;
use App\Models\Binaan\BahanPustaka;
use App\Models\Binaan\Koleksi;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Layanan;
use App\Models\Binaan\Pemberdayaan;
use App\Models\Binaan\Tenaga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BinaanUser extends Authenticatable
{
    use HasFactory;
    protected $guard = 'binaan';
    protected $table = 'binaan_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function kondisi_umum()
    {
        return $this->hasMany(KondisiUmum::class, 'user_binaan_id', 'id');
    }

    public function bahan_pustaka()
    {
        return $this->hasMany(BahanPustaka::class, 'user_binaan_id', 'id');
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, 'user_binaan_id', 'id');
    }

    public function pemberdayaan()
    {
        return $this->hasMany(Pemberdayaan::class, 'user_binaan_id', 'id');
    }

    public function tenaga()
    {
        return $this->hasMany(Tenaga::class, 'user_binaan_id', 'id');
    }

    public function sarana()
    {
        return $this->hasMany(Sarana::class, 'user_binaan_id', 'id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'user_binaan_id', 'id');
    }

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'user_binaan_id', 'id');
    }
}
