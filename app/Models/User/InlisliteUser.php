<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

// use Laravel\Sanctum\HasApiTokens;

class InlisliteUser extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;
    protected $guard = 'inlislite';
    protected $table = 'inlislite_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'username',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
