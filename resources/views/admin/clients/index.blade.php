@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clients</h1>

    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-3">New Client</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Document</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->document }}</td>
                    <td>
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                              method="POST"
                              style="display: inline-block"
                              onsubmit="return confirm('Delete this client?');">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clients->links() }}
</div>
@endsection
