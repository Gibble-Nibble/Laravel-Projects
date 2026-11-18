@extends('tfa7.layout')
@section('title', 'User Accounts')
@section('content')
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">User Accounts</h1>
            <p class="text-secondary mb-0">Manage POS users and profile images.</p>
        </div>
        <a href="{{ route('tfa7.users.create') }}" class="btn btn-primary">Add user</a>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr><th>User</th><th>Username</th><th>Full name</th><th>Email</th><th class="text-end">Action</th></tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td><img class="avatar rounded-circle" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="Avatar for {{ $user->full_name }}"></td>
                            <td class="fw-semibold">{{ $user->username }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('tfa7.users.edit', $user) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-secondary py-5">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
