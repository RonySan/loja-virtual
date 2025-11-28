@extends('layouts.app')

@section('content')
<h1>🍷 Bem-vindo à Adega</h1>

<div style="display:flex; flex-wrap:wrap; gap:20px;">
@foreach($products as $product)
    <div style="border:1px solid #ccc; padding:10px; width:200px;">
        <h3>{{ $product->name }}</h3>
        <p>R$ {{ $product->price }}</p>
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">Adicionar ao carrinho</button>
        </form>
    </div>
@endforeach
</div>

{{ $products->links() }}
@endsection
