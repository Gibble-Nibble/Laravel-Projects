<?php

namespace App\Http\Controllers;

use App\Mail\Tsa4TaskCompleted;
use App\Models\Tsa4Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class Tsa4TaskController extends Controller
{
    public function index(): View
    {
        return view('tsa4.tasks', [
            'tasks' => Tsa4Task::query()
                ->where('is_archived', false)
                ->orderBy('task_date')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('tsa4.manage.form', ['task' => new Tsa4Task]);
    }

    public function store(Request $request): RedirectResponse
    {
        $task = Tsa4Task::query()->create($this->validated($request));

        return redirect()->route('tsa4.tasks.index')
            ->with('success', "Task \"{$task->title}\" was created.");
    }

    public function show(Tsa4Task $task): View
    {
        abort_if($task->is_archived, 404);

        return view('tsa4.manage.show', compact('task'));
    }

    public function edit(Tsa4Task $task): View
    {
        abort_if($task->is_archived, 404);

        return view('tsa4.manage.form', compact('task'));
    }

    public function update(Request $request, Tsa4Task $task): RedirectResponse
    {
        abort_if($task->is_archived, 404);

        $data = $this->validated($request);
        $becameDone = $task->status !== 'done' && $data['status'] === 'done';
        $task->update($data);

        if ($becameDone) {
            Mail::to(config('services.tsa4_task_completed_recipient'))
                ->send(new Tsa4TaskCompleted($task));
        }

        return redirect()->route('tsa4.tasks.index')
            ->with('success', "Task \"{$task->title}\" was updated.");
    }

    public function destroy(Tsa4Task $task): RedirectResponse
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tsa4.tasks.index')
            ->with('success', "Task \"{$task->title}\" was archived.");
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:pending,in progress,done'],
            'task_date' => ['required', 'date'],
        ]);
    }
}
