<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;
    protected $connection = 'inlislite';
    protected $table = 'master_pekerjaan';
    protected $primaryKey = 'id';

    public function member()
    {
        return $this->hasMany(Member::class, 'Job_id', 'id');
    }
}
