@extends('layouts.app')

@section('content')

<h1>Categories</h1>

<a href="{{ route('admin.categories.create') }}">Create Category</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <tr>
        <th>Name</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $category) }}">Edit</a>

            <form action="{{ route('admin.categories.destroy', $category) }}"
                  method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
