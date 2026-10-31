@extends('tfa6.layout')

@section('title', 'Dashboard')

@section('content')
    <main class="container py-5">
        <div class="rounded-3 bg-success text-white p-4 p-md-5 mb-4">
            <p class="text-uppercase small fw-semibold mb-2 opacity-75">Technical Formative Assessment 6</p>
            <h1 class="display-5 fw-bold">Eloquent POS Application</h1>
            <p class="lead mb-0">A database-backed version of the TFA5 point-of-sale foundation.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('tfa6.customers') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100"><div class="card-body p-4">
                        <h2 class="h5 text-dark">Customer Accounts</h2>
                        <p class="text-secondary mb-0">Customers retrieved through the Customer Eloquent model.</p>
                    </div></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('tfa6.users') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100"><div class="card-body p-4">
                        <h2 class="h5 text-dark">User Accounts</h2>
                        <p class="text-secondary mb-0">Users retrieved from the database through Eloquent.</p>
                    </div></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('tfa6.about') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100"><div class="card-body p-4">
                        <h2 class="h5 text-dark">About the App</h2>
                        <p class="text-secondary mb-0">Learn how migrations, seeders, and models power this version.</p>
                    </div></div>
                </a>
            </div>
        </div>
    </main>
@endsection
