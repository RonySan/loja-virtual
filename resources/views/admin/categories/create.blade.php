@extends('layouts.app')

@section('content')
<h1>Create Category</h1>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}">

    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Save</button>
</form>

@endsection
