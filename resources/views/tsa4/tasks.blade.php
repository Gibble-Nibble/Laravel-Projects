@extends('tsa4.layout')
@section('title', 'Task List')
@section('content')
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div><p class="text-uppercase small fw-semibold text-secondary mb-2">TSA4 task manager</p><h1 class="h2 mb-0">Task List</h1></div>
        <div class="d-flex align-items-center gap-3">
            <span class="badge text-bg-primary">{{ $tasks->count() }} tasks</span>
            @auth('tsa4')<a class="btn btn-primary" href="{{ route('tsa4.tasks.create') }}">Create task</a>@endauth
        </div>
    </div>
    <div class="card border-0 shadow-sm"><div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark"><tr><th>Task</th><th>Status</th><th>Date</th>@auth('tsa4')<th class="text-end">Actions</th>@endauth</tr></thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td class="fw-semibold">{{ $task->title }}</td><td>{{ ucfirst($task->status) }}</td><td>{{ $task->task_date->format('M j, Y') }}</td>
                        @auth('tsa4')
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('tsa4.tasks.show', $task) }}">View</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('tsa4.tasks.edit', $task) }}">Edit</a>
                                <form method="POST" action="{{ route('tsa4.tasks.destroy', $task) }}" class="d-inline" onsubmit="return confirm('Archive this task?')">
                                    @csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Archive</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @empty
                    <tr><td colspan="{{ auth('tsa4')->check() ? 4 : 3 }}" class="text-center text-secondary py-5">No tasks found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div></div>
</main>
@endsection
