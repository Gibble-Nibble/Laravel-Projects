<?php

namespace Database\Seeders;

use App\Models\Tsa3Task;
use App\Models\Tsa3User;
use Illuminate\Database\Seeder;

class Tsa3Seeder extends Seeder
{
    public function run(): void
    {
        Tsa3User::query()->firstOrCreate(
            ['username' => 'rb'],
            ['full_name' => 'RB', 'email' => 'rb@example.com'],
        );

        $today = today();

        $tasks = [
            ['title' => 'Review project requirements', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Plan the database schema', 'status' => 'in progress', 'task_date' => $today],
            ['title' => 'Build the today dashboard', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Read the Laravel documentation', 'status' => 'completed', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Organize project files', 'status' => 'pending', 'task_date' => $today->copy()->subDay()],
            ['title' => 'Write feature tests', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Review the task list page', 'status' => 'in progress', 'task_date' => $today->copy()->addDay()],
            ['title' => 'Prepare the project submission', 'status' => 'pending', 'task_date' => $today->copy()->addDay()],
        ];

        foreach ($tasks as $task) {
            Tsa3Task::query()->updateOrCreate(
                ['title' => $task['title']],
                $task,
            );
        }
    }
}
