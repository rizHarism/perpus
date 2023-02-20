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
        'perpustakaan_id',
        'tahun',
        'buku_pelajaran_judul',
        'buku_pelajaran_eksemplar',
        'buku_panduan_judul',
        'buku_panduan_eksemplar',
        'buku_fiksi_judul',
        'buku_fiksi_eksemplar',
        'buku_non_fiksi_judul',
        'buku_non_fiksi_eksemplar',
        'buku_referensi_judul',
        'buku_referensi_eksemplar',
        'karya_guru_judul',
        'karya_guru_eksemplar',
        'karya_siswa_judul',
        'karya_siswa_eksemplar',
        'koran_judul',
        'koran_eksemplar',
        'majalah_judul',
        'majalah_eksemplar',
        'kaset',
        'cd',
        'vcd',
        'dvd',
        'multimedia_lain',
        'atlas',
        'peta',
        'globe',
        'karto_lain',
        'peraga_matematika',
        'peraga_ipa',
        'peraga_lain',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
