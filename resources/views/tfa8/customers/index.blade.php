@extends('tfa8.layout')
@section('title', 'Customer Accounts')
@section('content')
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div><h1 class="h2 mb-1">Customer Accounts</h1><p class="text-secondary mb-0">Create and maintain customer records.</p></div>
        <a href="{{ route('tfa8.customers.create') }}" class="btn btn-primary">Add customer</a>
    </div>
    @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
    <div class="card border-0 shadow-sm"><div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark"><tr><th>#</th><th>Full name</th><th>Email</th><th>Phone</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td><td class="fw-semibold">{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone }}</td>
                        <td class="text-end text-nowrap">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('tfa8.customers.show', $customer) }}">View</a>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('tfa8.customers.edit', $customer) }}">Edit</a>
                            <form method="POST" action="{{ route('tfa8.customers.destroy', $customer) }}" class="d-inline" onsubmit="return confirm('Delete this customer?')">
                                @csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-5">No customers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div></div>
</main>
@endsection
