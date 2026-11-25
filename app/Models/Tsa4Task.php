<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsa4Task extends Model
{
    protected $connection = 'tsa4';

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'status',
        'task_date',
        'is_archived',
    ];

    protected function casts(): array
    {
        return [
            'task_date' => 'date',
            'is_archived' => 'boolean',
        ];
    }
}
