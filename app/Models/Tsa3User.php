<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsa3User extends Model
{
    protected $connection = 'tsa3';

    protected $table = 'users';

    protected $fillable = [
        'username',
        'full_name',
        'email',
    ];
}
