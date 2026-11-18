@extends('tfa7.layout')
@section('title', 'Dashboard')
@section('content')
<main class="container py-5">
    <section class="hero text-white rounded-4 p-4 p-md-5 mb-4 shadow-sm">
        <p class="text-uppercase small fw-semibold mb-2 opacity-75">Technical Formative Assessment 7</p>
        <h1 class="display-5 fw-bold">Making It Editable in Laravel</h1>
        <p class="lead mb-0">Create, edit, validate, and manage POS accounts.</p>
    </section>
    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('tfa7.customers') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <span class="badge text-bg-primary mb-3">{{ $customerCount }} records</span>
                        <h2 class="h4 text-dark">Customer Accounts</h2>
                        <p class="text-secondary mb-0">Create and update customer contact information.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('tfa7.users') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <span class="badge text-bg-success mb-3">{{ $userCount }} records</span>
                        <h2 class="h4 text-dark">User Accounts</h2>
                        <p class="text-secondary mb-0">Manage users and display-ready profile avatars.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>
@endsection
