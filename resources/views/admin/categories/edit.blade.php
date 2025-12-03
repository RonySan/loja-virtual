@extends('layouts.app')

@section('content')
<h1>Edit Category</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}" required>
    </div>

    <button type="submit">Save</button>
</form>

@endsection
