@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Stock Movements</h1>

    <a href="{{ route('admin.stock.create') }}" class="btn btn-primary mb-3">New Movement</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Type</th>
                <th>Qty</th>
                <th>Notes</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movements as $move)
                <tr>
                    <td>{{ $move->id }}</td>
                    <td>{{ $move->product->name }}</td>
                    <td>
                        @if($move->type === 'in')
                            <span class="text-success">IN</span>
                        @else
                            <span class="text-danger">OUT</span>
                        @endif
                    </td>
                    <td>{{ $move->quantity }}</td>
                    <td>{{ $move->notes }}</td>
                    <td>{{ $move->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $movements->links() }}
</div>
@endsection
