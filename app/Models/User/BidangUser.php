<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangUser extends Model
{
    use HasFactory;
    protected $guard = 'bidang';
    protected $table = 'bidang_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'bidang_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
