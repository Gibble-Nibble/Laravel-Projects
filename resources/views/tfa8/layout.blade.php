<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - TFA8 POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background: #f4f7fb; color: #1f2937; } .hero { background: linear-gradient(135deg, #2563eb, #4f46e5); } .card { border-radius: 1rem; } .avatar { width: 48px; height: 48px; object-fit: cover; }</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('tfa8.home') }}">TFA8 POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tfa8Navigation" aria-controls="tfa8Navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="tfa8Navigation">
            <div class="navbar-nav ms-auto align-items-lg-center">
                <a class="nav-link" href="{{ route('tfa8.home') }}">Home</a>
                <a class="nav-link" href="{{ route('tfa8.about') }}">About</a>
                @auth('tfa8')
                    <a class="nav-link" href="{{ route('tfa8.customers.index') }}">Customers</a>
                    <a class="nav-link" href="{{ route('tfa8.users.index') }}">Users</a>
                    <form method="POST" action="{{ route('tfa8.logout') }}">@csrf<button class="nav-link border-0 bg-transparent">Sign out</button></form>
                @else
                    <a class="nav-link" href="{{ route('tfa8.login') }}">Sign in</a>
                    <a class="nav-link" href="{{ route('tfa8.register') }}">Register</a>
                @endauth
                @include('partials.project-switcher')
            </div>
        </div>
    </div>
</nav>
@if(session('success'))
    <div class="container pt-4"><div class="alert alert-success">{{ session('success') }}</div></div>
@endif
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
