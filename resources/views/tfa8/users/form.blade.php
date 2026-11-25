@extends('tfa8.layout')
@section('title', $user->exists ? 'Edit User' : 'Add User')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3">{{ $user->exists ? 'Edit user' : 'Add user' }}</h1>
        <p class="text-secondary">Passwords must be at least eight characters. Profile images must be 2MB or smaller.</p>
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" enctype="multipart/form-data" action="{{ $user->exists ? route('tfa8.users.update', $user) : route('tfa8.users.store') }}">
            @csrf @if($user->exists) @method('PUT') @endif
            <div class="mb-3"><label class="form-label" for="username">Username</label><input id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control" required></div>
            <div class="mb-3"><label class="form-label" for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="form-control" required></div>
            <div class="mb-3"><label class="form-label" for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required></div>
            <div class="mb-3"><label class="form-label" for="password">Password {{ $user->exists ? '(leave blank to keep current)' : '' }}</label><input id="password" type="password" name="password" class="form-control" {{ $user->exists ? '' : 'required' }} autocomplete="new-password"></div>
            <div class="mb-3"><label class="form-label" for="password_confirmation">Confirm password</label><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password"></div>
            <div class="mb-4"><label class="form-label" for="avatar">Profile picture</label><input id="avatar" type="file" name="avatar" accept="image/*" class="form-control"></div>
            <a href="{{ route('tfa8.users.index') }}" class="btn btn-light">Cancel</a>
            <button class="btn btn-primary">{{ $user->exists ? 'Save changes' : 'Create user' }}</button>
        </form>
    </div></div>
</div></div></main>
@endsection
