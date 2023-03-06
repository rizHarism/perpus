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
        'program_leaflet',
        'program_banner',
        'program_brosur',
        'program_penyuluhan',
        'program_pameran',
        'program_lomba',
        'pengunjung_harian',
        'sumber_bos',
        'sumber_apbd',
        'sumber_lainnya',
        'alokasi_pelajaran',
        'alokasi_pengayaan',
        'alokasi_lainnya',
        'penambahan_buku',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
