@extends('auth.project-layout')
@section('title', 'Sign in')
@section('content')
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 mb-2">Sign in</h1>
                    <p class="text-secondary mb-4">Sign in to manage {{ $project === 'tfa8' ? 'POS accounts' : 'tasks' }}.</p>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route($project.'.login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" autocomplete="current-password" required>
                        </div>
                        <div class="form-check mb-4">
                            <input id="remember" type="checkbox" name="remember" value="1" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button class="btn btn-primary w-100">Sign in</button>
                    </form>
                    <p class="text-center text-secondary mt-4 mb-0">
                        Need an account? <a href="{{ route($project.'.register') }}">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
