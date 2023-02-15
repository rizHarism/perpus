<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanPustaka extends Model
{
    use HasFactory;
    protected $guard = 'binaan';
    protected $table = 'binaan_bahan_pustaka';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_binaan_id',
        'tahun',
        'pedoman_katalog',
        'pedoman_klasifikasi',
        'aplikasi_perpus',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'user_binaan_id', 'id');
    }
}
