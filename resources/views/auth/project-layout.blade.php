<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ $projectName }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route($project.'.home') }}">{{ $projectName }}</a>
        <a class="btn btn-outline-light btn-sm" href="{{ route($project.'.home') }}">Back to project</a>
    </div>
</nav>
@yield('content')
</body>
</html>
