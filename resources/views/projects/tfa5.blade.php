<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TFA5 POS App</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="{{ route('projects.tfa5') }}">TFA5 POS App</a>
                <a class="btn btn-outline-light btn-sm" href="{{ route('projects.index') }}">All projects</a>
            </div>
        </nav>

        <main class="container py-5">
            <div class="bg-white rounded-3 shadow-sm p-4 p-md-5">
                <span class="badge text-bg-primary mb-3">TFA5</span>
                <h1 class="display-6 fw-bold">POS App</h1>
                <p class="lead text-secondary">
                    Welcome to the TFA5 application. The POS pages will be built inside this project area.
                </p>
            </div>
        </main>
    </body>
</html>
