@extends('tfa5.layout')

@section('title', 'Dashboard')

@section('content')
    <main class="container py-5">
        <div class="rounded-3 bg-primary text-white p-4 p-md-5 mb-4">
            <p class="text-uppercase small fw-semibold mb-2 opacity-75">Technical Formative Assessment 5</p>
            <h1 class="display-5 fw-bold">Point-of-Sale Application</h1>
            <p class="lead mb-0">Manage customer accounts and POS users from one simple dashboard.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('tfa5.customers') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h2 class="h5 text-dark">Customer Accounts</h2>
                            <p class="text-secondary mb-0">View the customer records used by the POS application.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('tfa5.users') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h2 class="h5 text-dark">User Accounts</h2>
                            <p class="text-secondary mb-0">Review the users and roles assigned to the application.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('tfa5.about') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h2 class="h5 text-dark">About the App</h2>
                            <p class="text-secondary mb-0">Learn about the purpose and Laravel structure of TFA5.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
