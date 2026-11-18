@extends('tsa3.layout')
@section('title', 'Tasks for Today')
@section('content')
<main class="container py-5">
    <section class="hero text-white rounded-4 p-4 p-md-5 mb-4 shadow-sm">
        <p class="text-uppercase small fw-semibold mb-2 opacity-75">Technical Summative Assessment 3</p>
        <h1 class="display-5 fw-bold">Tasks for Today</h1>
        <p class="lead mb-0">{{ today()->format('F j, Y') }}</p>
    </section>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 p-4 pb-0">
            <h2 class="h4 mb-0">Today's tasks</h2>
        </div>
        <div class="card-body p-4">
            @forelse($tasks as $task)
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 border-bottom py-3">
                    <span class="fw-semibold">{{ $task->title }}</span>
                    <span class="badge text-bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in progress' ? 'warning' : 'secondary') }}">
                        {{ ucfirst($task->status) }}
                    </span>
                </div>
            @empty
                <p class="text-secondary mb-0">There are no tasks scheduled for today.</p>
            @endforelse
        </div>
    </div>
</main>
@endsection
