@extends('tfa6.layout')

@section('title', 'User Accounts')

@section('content')
    <main class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div><h1 class="h2 mb-1">User Accounts</h1><p class="text-secondary mb-0">Records retrieved with the User Eloquent model.</p></div>
            <span class="badge text-bg-success">{{ $users->count() }} users</span>
        </div>
        <div class="card border-0 shadow-sm"><div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark"><tr><th>#</th><th>Username</th><th>Full name</th><th>Email</th></tr></thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr><td>{{ $user->id }}</td><td class="fw-semibold">{{ $user->username }}</td><td>{{ $user->full_name }}</td><td>{{ $user->email }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div></div>
    </main>
@endsection
