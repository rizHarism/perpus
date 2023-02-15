<?php

namespace App\Models\Binaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenaga extends Model
{
    use HasFactory;

    protected $guard = 'binaan';
    protected $table = 'binaan_tenaga';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_binaan_id',
        'tahun',
        'nama',
        'status_pegawai',
        'status_pendidikan',
        'status_pendidikan',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'user_binaan_id', 'id');
    }
}
