@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New Stock Movement</h1>

    <form action="{{ route('admin.stock.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                <option value="">Select...</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} (Stock: {{ $p->calculated_stock }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="in">IN (Entry)</option>
                <option value="out">OUT (Exit)</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Notes</label>
            <input type="text" name="notes" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
