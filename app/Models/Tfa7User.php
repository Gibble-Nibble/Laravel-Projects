<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tfa7User extends Model
{
    protected $table = 'tfa7_users';

    protected $fillable = [
        'username',
        'full_name',
        'email',
        'avatar',
    ];
}
