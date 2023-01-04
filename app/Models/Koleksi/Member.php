<?php

namespace App\Models\Koleksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $primaryKey = 'ID';

    public function loanItem()
    {
        return $this->hasMany(CollectionLoanItem::class, 'member_id', 'ID');
    }

    public function jobStatus()
    {
        return $this->belongsTo(JobStatus::class, 'Job_id', 'id');
    }
}
