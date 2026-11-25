<?php

namespace App\Http\Controllers;

use App\Models\Tsa4Task;
use App\Models\Tsa4User;
use Illuminate\Contracts\View\View;

class Tsa4PageController extends Controller
{
    public function index(): View
    {
        return view('tsa4.home', [
            'tasks' => Tsa4Task::query()
                ->where('is_archived', false)
                ->whereDate('task_date', today())
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function profile(): View
    {
        return view('tsa4.profile', [
            'user' => Tsa4User::query()->orderBy('id')->first(),
        ]);
    }

    public function about(): View
    {
        return view('tsa4.about');
    }
}
