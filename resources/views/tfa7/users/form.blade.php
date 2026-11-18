@extends('tfa7.layout')
@section('title', $user->exists ? 'Edit User' : 'Add User')
@section('content')
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3">{{ $user->exists ? 'Edit user' : 'Add user' }}</h1>
                    <p class="text-secondary">Username and full name are required. Avatar images must be 2MB or smaller.</p>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ $user->exists ? route('tfa7.users.update', $user) : route('tfa7.users.store') }}">
                        @csrf
                        @if($user->exists) @method('PUT') @endif
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror" required>
                            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="full_name">Full name</label>
                            <input id="full_name" name="full_name" value="{{ old('full_name', $user->full_name) }}" class="form-control @error('full_name') is-invalid @enderror" required>
                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="avatar">Profile picture</label>
                            <input id="avatar" type="file" name="avatar" accept="image/*" class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <a href="{{ route('tfa7.users') }}" class="btn btn-light">Cancel</a>
                        <button class="btn btn-primary">{{ $user->exists ? 'Save changes' : 'Create user' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
