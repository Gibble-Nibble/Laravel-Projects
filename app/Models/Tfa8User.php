<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tfa8User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'tfa8';

    protected $table = 'users';

    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
