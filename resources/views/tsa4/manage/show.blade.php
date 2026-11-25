@extends('tsa4.layout')
@section('title', 'Task Details')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3 mb-4">Task details</h1>
        <dl class="row"><dt class="col-sm-4">Task</dt><dd class="col-sm-8">{{ $task->title }}</dd><dt class="col-sm-4">Status</dt><dd class="col-sm-8">{{ ucfirst($task->status) }}</dd><dt class="col-sm-4">Date</dt><dd class="col-sm-8">{{ $task->task_date->format('M j, Y') }}</dd></dl>
        <a href="{{ route('tsa4.tasks.index') }}" class="btn btn-light">Back</a>
        <a href="{{ route('tsa4.tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
    </div></div>
</div></div></main>
@endsection
