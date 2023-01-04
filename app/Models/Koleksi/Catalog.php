<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';
    protected $primaryKey = 'ID';

    public function collection()
    {
        return $this->hasMany(Collection::class, 'ID', 'Catalog_id');
    }
}
