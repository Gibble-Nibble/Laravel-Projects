<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsa3Task extends Model
{
    protected $connection = 'tsa3';

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'status',
        'task_date',
    ];

    protected $casts = [
        'task_date' => 'date',
    ];
}
