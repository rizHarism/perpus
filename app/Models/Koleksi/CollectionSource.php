<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionSource extends Model
{
    use HasFactory;

    protected $table = 'collectionsources';
    protected $primaryKey = 'ID';

    public function collection()
    {
        return $this->hasMany(Collection::class, 'Source_id', 'ID');
    }
}
