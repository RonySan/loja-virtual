@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Category</label>
    <select name="category_id" required>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected($product->category_id == $c->id)>
                {{ $c->name }}
            </option>
        @endforeach
    </select>

    <label>Name</label>
    <input type="text" name="name" value="{{ $product->name }}" required>

    <label>Price</label>
    <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>

    <label>Stock</label>
    <input type="number" name="stock" value="{{ $product->stock }}" required>

    <label>Description</label>
    <textarea name="description">{{ $product->description }}</textarea>

    <h3>Existing Images</h3>
    @foreach ($product->images as $img)
        <img src="{{ asset('storage/' . $img->path) }}" width="80">
    @endforeach

    <label>Add new images</label>
    <input type="file" name="images[]" multiple>

    <button type="submit">Save</button>
</form>

@endsection
