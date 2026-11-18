<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - TFA7 POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7fb; color: #1f2937; }
        .hero { background: linear-gradient(135deg, #2563eb, #4f46e5); }
        .card { border-radius: 1rem; }
        .avatar { width: 48px; height: 48px; object-fit: cover; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('tfa7.home') }}">TFA7 POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tfa7Navigation" aria-controls="tfa7Navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="tfa7Navigation">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('tfa7.home') }}">Home</a>
                <a class="nav-link" href="{{ route('tfa7.about') }}">About</a>
                <a class="nav-link" href="{{ route('tfa7.customers') }}">Customers</a>
                <a class="nav-link" href="{{ route('tfa7.users') }}">Users</a>
                <a class="nav-link text-warning" href="{{ route('projects.index') }}">All projects</a>
            </div>
        </div>
    </div>
</nav>
@if(session('success'))
    <div class="container pt-4">
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
