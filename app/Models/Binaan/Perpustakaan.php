<?php

namespace App\Models\Binaan;

use App\Models\User\BinaanUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_perpustakaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'nama_perpustakaan',
        'nama_kepala',
        'no_hp_kepala',
    ];

    public function binaan_user()
    {
        return $this->hasMany(BinaanUser::class, 'perpustakaan_id', 'id');
    }

    public function kondisi_umum()
    {
        return $this->hasMany(KondisiUmum::class, 'perpustakaan_id', 'id');
    }

    public function bahan_pustaka()
    {
        return $this->hasMany(BahanPustaka::class, 'perpustakaan_id', 'id');
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, 'perpustakaan_id', 'id');
    }

    public function pemberdayaan()
    {
        return $this->hasMany(Pemberdayaan::class, 'perpustakaan_id', 'id');
    }

    public function tenaga()
    {
        return $this->hasMany(Tenaga::class, 'perpustakaan_id', 'id');
    }

    public function sarana()
    {
        return $this->hasMany(Sarana::class, 'perpustakaan_id', 'id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'perpustakaan_id', 'id');
    }

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'perpustakaan_id', 'id');
    }
}
