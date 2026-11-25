<?php

namespace Database\Seeders;

use App\Models\Tsa4Task;
use Illuminate\Database\Seeder;

class Tsa4Seeder extends Seeder
{
    public function run(): void
    {
        $today = today();

        foreach ([
            ['title' => 'Review project requirements', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Plan the database schema', 'status' => 'in progress', 'task_date' => $today],
            ['title' => 'Build the today dashboard', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Read the Laravel documentation', 'status' => 'done', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Organize project files', 'status' => 'pending', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Write feature tests', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Review the task list page', 'status' => 'in progress', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Prepare the project submission', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
        ] as $task) {
            Tsa4Task::query()->updateOrCreate(
                ['title' => $task['title']],
                $task,
            );
        }
    }
}
