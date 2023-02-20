<?php

namespace App\Models\Binaan;

use App\Models\User\BinaanUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_administrasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'perpustakaan_id',
        'tahun',
        'buku_induk',
        'katalog_kartu',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
