<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - TFA6 POS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="{{ route('tfa6.home') }}">TFA6 POS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tfa6Navigation" aria-controls="tfa6Navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="tfa6Navigation">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="{{ route('tfa6.home') }}">Home</a>
                        <a class="nav-link" href="{{ route('tfa6.about') }}">About</a>
                        <a class="nav-link" href="{{ route('tfa6.customers') }}">Customers</a>
                        <a class="nav-link" href="{{ route('tfa6.users') }}">Users</a>
                        <a class="nav-link text-warning" href="{{ route('projects.index') }}">All projects</a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
