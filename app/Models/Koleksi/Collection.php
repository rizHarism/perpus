<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $connection = 'inlislite';
    protected $table = 'collections';
    protected $primaryKey = 'ID';

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'Catalog_id', 'ID');
    }

    public function location_library()
    {
        return $this->belongsTo(LocationLibrary::class, 'Location_Library_id', 'ID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'Location_id', 'ID');
    }

    public function source()
    {
        return $this->belongsTo(CollectionSource::class, 'Source_id', 'ID');
    }

    public function collectionLoanItem()
    {
        return $this->hasMany(CollectionLoanItem::class, 'Collection_id', 'ID');
    }
}
