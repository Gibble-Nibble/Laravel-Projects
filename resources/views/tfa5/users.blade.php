@extends('tfa5.layout')

@section('title', 'User Accounts')

@section('content')
    <main class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h1 class="h2 mb-1">User Accounts</h1>
                <p class="text-secondary mb-0">POS users from the temporary account data source.</p>
            </div>
            <span class="badge text-bg-primary">{{ count($users) }} users</span>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td class="fw-semibold">{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td><span class="badge text-bg-secondary">{{ $user['role'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
