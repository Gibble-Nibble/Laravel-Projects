<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Hub</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: #f8f9fa;
            }

            .hero {
                background: linear-gradient(135deg, #212529, #495057);
            }

            .project-card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .project-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.12);
            }
        </style>
    </head>
    <body>
        <header class="hero text-white">
            <div class="container py-5">
                <p class="mb-2 text-uppercase small fw-semibold opacity-75">Laravel project hub</p>
                <h1 class="display-5 fw-bold">My Projects</h1>
                <p class="lead mb-0">Select a project below to open its web application.</p>
            </div>
        </header>

        <main class="container py-5">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('tfa5.home') }}" class="text-decoration-none text-dark">
                        <article class="card project-card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <span class="badge text-bg-primary mb-3">TFA5</span>
                                <h2 class="h4 card-title">POS App</h2>
                                <p class="card-text text-secondary">
                                    A Laravel point-of-sale application for managing customers, users, and account information.
                                </p>
                                <span class="btn btn-outline-primary">Open project</span>
                            </div>
                        </article>
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>
