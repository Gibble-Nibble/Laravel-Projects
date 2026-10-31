@extends('tfa5.layout')

@section('title', 'Customer Accounts')

@section('content')
    <main class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">Customer Accounts</h1>
                <p class="text-secondary mb-0">Customer records from the temporary POS data source.</p>
            </div>
            <span class="badge text-bg-primary">{{ count($customers) }} customers</span>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td class="fw-semibold">{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['phone'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
