<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionLoanItem extends Model
{
    use HasFactory;

    protected $table = 'collectionloanitems';
    protected $primaryKey = 'ID';

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'Collection_id', 'ID');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'ID');
    }
}
