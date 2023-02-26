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
        'perpustakaan_id',
        'tahun',
        'npp',
        'sk_pendirian',
        'program_kerja',
        'visi_misi',
        'siswa_l',
        'siswa_p',
        'staf_l',
        'staf_p',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }

    public function perpustakaan()
    {
        return $this->belongsTo(Perpustakaan::class, 'perpustakaan_id', 'id');
    }
}
