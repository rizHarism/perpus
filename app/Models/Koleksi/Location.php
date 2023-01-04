<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'ID';

    public function collection()
    {
        return $this->hasMany(Collection::class, 'Location_id', 'ID');
    }
}
