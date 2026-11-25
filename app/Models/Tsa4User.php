<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tsa4User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'tsa4';

    protected $table = 'users';

    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
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
