@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New Client</h1>

    <form action="{{ route('admin.clients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
