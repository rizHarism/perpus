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
        'perpustakaan_id',
        'tahun',
        'nama',
        'status_pegawai',
        'status_pendidikan',
        'jenis_kelamin',
        'status',
    ];

    public function user_binaan()
    {
        return $this->belongsTo(BinaanUser::class, 'perpustakaan_id', 'id');
    }
}
