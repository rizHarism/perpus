<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberdayaan extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_pemberdayaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'perpustakaan_id',
        'tahun',
        'slogan',
        'program_kerja',
        'pengunjung_harian',
        'sumber_anggaran',
        'alokasi_anggaran',
        'penambahan_buku',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
