<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tfa8Customer extends Model
{
    protected $connection = 'tfa8';

    protected $table = 'customers';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];
}
