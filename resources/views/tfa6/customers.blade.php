@extends('tfa6.layout')

@section('title', 'Customer Accounts')

@section('content')
    <main class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div><h1 class="h2 mb-1">Customer Accounts</h1><p class="text-secondary mb-0">Records retrieved with Eloquent.</p></div>
            <span class="badge text-bg-success">{{ $customers->count() }} customers</span>
        </div>
        <div class="card border-0 shadow-sm"><div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark"><tr><th>#</th><th>Full name</th><th>Email</th><th>Phone</th></tr></thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr><td>{{ $customer->id }}</td><td class="fw-semibold">{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div></div>
    </main>
@endsection
