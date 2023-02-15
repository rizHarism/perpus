<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_layanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_binaan_id',
        'tahun',
        'sistem_layanan',
        'hari_start',
        'hari_awal',
        'jam_buka',
        'jam_buka',
        'jam_tutup',
        'pengunjung_siswa_laki',
        'pengunjung_siswa_perempuan',
        'pengunjung_guru_laki',
        'pengunjung_guru_perempuan',
        'peminjam_siswa_laki',
        'peminjam_siswa_perempuan',
        'peminjam_guru_laki',
        'peminjam_guru_perempuan',
        'koleksi_terbaca_judul',
        'koleksi_terbaca_eksemplar',
        'koleksi_terpinjam_judul',
        'koleksi_terpinjam_eksemplar',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'user_binaan_id', 'id');
    }
}
