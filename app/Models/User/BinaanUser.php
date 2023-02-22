<?php

namespace App\Models\User;

use App\Models\Binaan\Administrasi;
use App\Models\Binaan\BahanPustaka;
use App\Models\Binaan\Koleksi;
use App\Models\Binaan\KondisiUmum;
use App\Models\Binaan\Layanan;
use App\Models\Binaan\Pemberdayaan;
use App\Models\Binaan\Perpustakaan;
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
        'username',
        'email',
        'password',
        'perpustakaan_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];

    public function perpustakaan()
    {
        return $this->belongsTo(Perpustakaan::class, 'perpustakaan_id', 'id');
    }
}
