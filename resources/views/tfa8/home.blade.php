@extends('tfa8.layout')
@section('title', 'Dashboard')
@section('content')
<main class="container py-5">
    <section class="hero text-white rounded-4 p-4 p-md-5 mb-4 shadow-sm">
        <p class="text-uppercase small fw-semibold mb-2 opacity-75">Technical Formative Assessment 8</p>
        <h1 class="display-5 fw-bold">Locking It Down</h1>
        <p class="lead mb-0">Manage POS accounts with authenticated resource routes.</p>
    </section>
    <div class="row g-4">
        @foreach([['customers', 'Customer Accounts', $customerCount, 'Manage customer contact information.'], ['users', 'User Accounts', $userCount, 'Manage users and profile images.']] as [$resource, $label, $count, $description])
            <div class="col-md-6">
                <a href="{{ auth('tfa8')->check() ? route('tfa8.'.$resource.'.index') : route('tfa8.login') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100"><div class="card-body p-4">
                        <span class="badge text-bg-primary mb-3">{{ $count }} records</span>
                        <h2 class="h4 text-dark">{{ $label }}</h2>
                        <p class="text-secondary mb-0">{{ $description }}</p>
                    </div></div>
                </a>
            </div>
        @endforeach
    </div>
</main>
@endsection
