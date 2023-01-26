<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaanUser extends Model
{
    use HasFactory;
    protected $guard = 'binaan';
    protected $table = 'binaan_user';
    protected $primaryKey = 'id';
}
