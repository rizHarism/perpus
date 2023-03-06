<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PustakawanUser extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard = 'pustakawan';
    protected $table = 'pustakawan_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'jabatan_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
