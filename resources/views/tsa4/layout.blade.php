<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - TSA4 Tasks for Today</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body { background: #f5f7fa; color: #1f2937; } .hero { background: linear-gradient(135deg, #173b63, #26748a); }</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('tsa4.home') }}">TSA4 Tasks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tsa4Navigation" aria-controls="tsa4Navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="tsa4Navigation">
            <div class="navbar-nav ms-auto align-items-lg-center">
                <a class="nav-link" href="{{ route('tsa4.home') }}">Today</a>
                <a class="nav-link" href="{{ route('tsa4.tasks.index') }}">Task list</a>
                <a class="nav-link" href="{{ route('tsa4.profile') }}">Profile</a>
                <a class="nav-link" href="{{ route('tsa4.about') }}">About</a>
                @auth('tsa4')
                    <a class="nav-link" href="{{ route('tsa4.tasks.index') }}">Manage tasks</a>
                    <form method="POST" action="{{ route('tsa4.logout') }}">@csrf<button class="nav-link border-0 bg-transparent">Sign out</button></form>
                @else
                    <a class="nav-link" href="{{ route('tsa4.login') }}">Sign in</a>
                    <a class="nav-link" href="{{ route('tsa4.register') }}">Register</a>
                @endauth
                @include('partials.project-switcher')
            </div>
        </div>
    </div>
</nav>
@if(session('success'))<div class="container pt-4"><div class="alert alert-success">{{ session('success') }}</div></div>@endif
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
