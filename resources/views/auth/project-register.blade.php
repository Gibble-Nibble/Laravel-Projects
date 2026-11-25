@extends('auth.project-layout')
@section('title', 'Create account')
@section('content')
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 mb-2">Create an account</h1>
                    <p class="text-secondary mb-4">Register to manage {{ $project === 'tfa8' ? 'POS accounts' : 'tasks' }}.</p>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route($project.'.register.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input id="username" name="username" value="{{ old('username') }}" class="form-control" autocomplete="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="full_name">Full name</label>
                            <input id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control" autocomplete="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="password_confirmation">Confirm password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                        </div>
                        <button class="btn btn-primary w-100">Register</button>
                    </form>
                    <p class="text-center text-secondary mt-4 mb-0">
                        Already registered? <a href="{{ route($project.'.login') }}">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
