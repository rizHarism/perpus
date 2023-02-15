<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_koleksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_binaan_table',
        'tahun',
        'buku_pelajaran_judul',
        'buku_pelajaran_eksemplar',
        'buku_fiksi_judul',
        'buku_fiksi_eksemplar',
        'buku_non_fiksi_judul',
        'buku_non_fiksi_eksemplar',
        'karya_guru_judul',
        'karya_guru_eksemplar',
        'karya_siswa_judul',
        'karya_siswa_eksemplar',
        'koran_judul',
        'koran_eksemplar',
        'majalah_judul',
        'majalah_eksemplar',
        'majalah_eksemplar',
        'kaset',
        'cd',
        'vcd',
        'dvd',
        'multimedia_lain',
        'atlas',
        'globe',
        'karto_lain',
        'peraga_matematika',
        'peraga_ipa',
        'peraga_lain',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'user_binaan_id', 'id');
    }
}
