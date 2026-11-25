@extends('tsa4.layout')
@section('title', $task->exists ? 'Edit Task' : 'Create Task')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3">{{ $task->exists ? 'Edit task' : 'Create task' }}</h1>
        <p class="text-secondary">Enter the task details below.</p>
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ $task->exists ? route('tsa4.tasks.update', $task) : route('tsa4.tasks.store') }}">
            @csrf @if($task->exists) @method('PUT') @endif
            <div class="mb-3"><label class="form-label" for="title">Task</label><input id="title" name="title" value="{{ old('title', $task->title) }}" class="form-control" required maxlength="255"></div>
            <div class="mb-3">
                <label class="form-label" for="status">Status</label>
                <select id="status" name="status" class="form-select" required>
                    @foreach(['pending' => 'Pending', 'in progress' => 'In progress', 'done' => 'Done'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', $task->status ?: 'pending') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4"><label class="form-label" for="task_date">Date</label><input id="task_date" type="date" name="task_date" value="{{ old('task_date', $task->task_date?->format('Y-m-d') ?? today()->format('Y-m-d')) }}" class="form-control" required></div>
            <a href="{{ route('tsa4.tasks.index') }}" class="btn btn-light">Cancel</a>
            <button class="btn btn-primary">{{ $task->exists ? 'Save changes' : 'Create task' }}</button>
        </form>
    </div></div>
</div></div></main>
@endsection
