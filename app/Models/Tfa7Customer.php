<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tfa7Customer extends Model
{
    protected $table = 'tfa7_customers';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];
}
