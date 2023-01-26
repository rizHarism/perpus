<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InlisliteUser extends Model
{
    use HasFactory;
    protected $guard = 'inlislite';
    protected $table = 'inlislite_user';
    protected $primaryKey = 'id';
}
