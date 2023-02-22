<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    use HasFactory;
    protected $guard = 'survey';
    protected $table = 'survey_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
