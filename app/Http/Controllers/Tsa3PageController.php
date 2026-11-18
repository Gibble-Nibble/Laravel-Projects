<?php

namespace App\Http\Controllers;

use App\Models\Tsa3Task;
use App\Models\Tsa3User;
use Illuminate\Contracts\View\View;

class Tsa3PageController extends Controller
{
    public function index(): View
    {
        return view('tsa3.home', [
            'tasks' => Tsa3Task::query()
                ->whereDate('task_date', today())
                ->orderBy('task_date')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function tasks(): View
    {
        return view('tsa3.tasks', [
            'tasks' => Tsa3Task::query()
                ->orderBy('task_date')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function profile(): View
    {
        return view('tsa3.profile', [
            'user' => Tsa3User::query()->firstOrFail(),
        ]);
    }

    public function about(): View
    {
        return view('tsa3.about');
    }
}
