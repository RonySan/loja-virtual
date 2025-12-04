@extends('layouts.app')

@section('content')
<h1>Create Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Category</label>
    <select name="category_id" required>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Price</label>
    <input type="number" name="price" step="0.01" required>

    <label>Stock</label>
    <input type="number" name="stock" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Images</label>
    <input type="file" name="images[]" multiple>

    <button type="submit">Save</button>
</form>

@endsection
