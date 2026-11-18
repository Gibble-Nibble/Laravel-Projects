@extends('tsa3.layout')
@section('title', 'Profile')
@section('content')
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <p class="text-uppercase small fw-semibold text-secondary mb-2">TSA3 account</p>
                    <h1 class="h2 mb-4">Profile</h1>
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Username</dt>
                        <dd class="col-sm-8">{{ $user->username }}</dd>
                        <dt class="col-sm-4">Full name</dt>
                        <dd class="col-sm-8">{{ $user->full_name }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
