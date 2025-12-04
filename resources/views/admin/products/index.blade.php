@extends('layouts.app')

@section('content')
<h1>Products</h1>

<a href="{{ route('admin.products.create') }}">+ New Product</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? '—' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>

            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}

@endsection
