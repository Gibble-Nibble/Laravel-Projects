<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - TSA3 Tasks for Today</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f7fa; color: #1f2937; }
        .hero { background: linear-gradient(135deg, #173b63, #26748a); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('tsa3.home') }}">TSA3 Tasks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tsa3Navigation" aria-controls="tsa3Navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="tsa3Navigation">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('tsa3.home') }}">Today</a>
                <a class="nav-link" href="{{ route('tsa3.tasks') }}">Task list</a>
                <a class="nav-link" href="{{ route('tsa3.profile') }}">Profile</a>
                <a class="nav-link" href="{{ route('tsa3.about') }}">About</a>
                @include('partials.project-switcher')
            </div>
        </div>
    </div>
</nav>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
