<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiUmum extends Model
{
    use HasFactory;
    protected $guard = 'binaan';
    protected $table = 'binaan_kondisi_umum';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_binaan_id',
        'tahun',
        'npp',
        'sk_pendirian',
        'siswa_l',
        'siswa_p',
        'staf_l',
        'staf_p',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'user_binaan_id', 'id');
    }
}
