@extends('tsa3.layout')
@section('title', 'Task List')
@section('content')
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <p class="text-uppercase small fw-semibold text-secondary mb-2">TSA3 task manager</p>
            <h1 class="h2 mb-0">Task List</h1>
        </div>
        <span class="badge text-bg-primary">{{ $tasks->count() }} tasks</span>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr><th>Task</th><th>Status</th><th>Date</th></tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td class="fw-semibold">{{ $task->title }}</td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td>{{ $task->task_date->format('M j, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-secondary py-5">No tasks found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
