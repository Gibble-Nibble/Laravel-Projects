@extends('tfa8.layout')
@section('title', 'User Details')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3 mb-4">User details</h1>
        <dl class="row"><dt class="col-sm-4">Username</dt><dd class="col-sm-8">{{ $user->username }}</dd><dt class="col-sm-4">Full name</dt><dd class="col-sm-8">{{ $user->full_name }}</dd><dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $user->email }}</dd></dl>
        <a href="{{ route('tfa8.users.index') }}" class="btn btn-light">Back</a>
        <a href="{{ route('tfa8.users.edit', $user) }}" class="btn btn-primary">Edit</a>
    </div></div>
</div></div></main>
@endsection
