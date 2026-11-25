@extends('tfa8.layout')
@section('title', 'Customer Details')
@section('content')
<main class="container py-5"><div class="row justify-content-center"><div class="col-lg-7">
    <div class="card border-0 shadow-sm"><div class="card-body p-4 p-md-5">
        <h1 class="h3 mb-4">Customer details</h1>
        <dl class="row"><dt class="col-sm-4">Full name</dt><dd class="col-sm-8">{{ $customer->full_name }}</dd><dt class="col-sm-4">Email</dt><dd class="col-sm-8">{{ $customer->email }}</dd><dt class="col-sm-4">Phone</dt><dd class="col-sm-8">{{ $customer->phone }}</dd></dl>
        <a href="{{ route('tfa8.customers.index') }}" class="btn btn-light">Back</a>
        <a href="{{ route('tfa8.customers.edit', $customer) }}" class="btn btn-primary">Edit</a>
    </div></div>
</div></div></main>
@endsection
