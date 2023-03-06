<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_sarana';
    protected $primaryKey = 'id';
    protected $fillable = [
        'perpustakaan_id',
        'tahun',
        'luas_ruangan',
        'area_koleksi',
        'area_baca',
        'area_kerja',
        'area_multimedia',
        'kebersihan',
        'kerapian',
        'projector',
        'ac_kipas',
        'komputer',
        'internet',
        'televisi',
        'vcd',
        'rak_buku',
        'rak_koran',
        'rak_referensi',
        'rak_majalah',
        'meja_baca',
        'meja_sirkulasi',
        'meja_kerja',
        'kursi_baca',
        'kursi_kerja',
        'almari_katalog',
        'loker',
        'mading',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
