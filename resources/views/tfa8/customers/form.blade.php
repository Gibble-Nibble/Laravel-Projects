@extends('tfa8.layout')
@section('title', $customer->exists ? 'Edit Customer' : 'Add Customer')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3">{{ $customer->exists ? 'Edit customer' : 'Add customer' }}</h1>
        <p class="text-secondary">All fields are required.</p>
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ $customer->exists ? route('tfa8.customers.update', $customer) : route('tfa8.customers.store') }}">
            @csrf @if($customer->exists) @method('PUT') @endif
            <div class="mb-3"><label class="form-label" for="full_name">Full name</label><input id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name) }}" class="form-control" required></div>
            <div class="mb-3"><label class="form-label" for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $customer->email) }}" class="form-control" required></div>
            <div class="mb-4"><label class="form-label" for="phone">Phone</label><input id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" class="form-control" required></div>
            <a href="{{ route('tfa8.customers.index') }}" class="btn btn-light">Cancel</a>
            <button class="btn btn-primary">{{ $customer->exists ? 'Save changes' : 'Create customer' }}</button>
        </form>
    </div></div>
</div></div></main>
@endsection
