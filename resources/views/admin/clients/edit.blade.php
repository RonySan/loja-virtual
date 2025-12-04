@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Client</h1>

    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $client->email }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
