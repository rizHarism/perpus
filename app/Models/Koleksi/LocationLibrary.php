<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationLibrary extends Model
{
    use HasFactory;
    protected $connection = 'inlislite';
    protected $table = 'location_library';
    protected $primaryKey = 'ID';

    public function collection()
    {
        return $this->hasMany(Collection::class, 'Location_id', 'ID');
    }
}
