@extends('admin.layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Produtos</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary">+ Novo Produto</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ativo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'Sem categoria' }}</td>
            <td>R$ {{ number_format($product->price_cents / 100, 2, ',', '.') }}</td>
            <td>{{ $product->active ? 'Sim' : 'Não' }}</td>
            <td>
                <a href="{{ route('produtos.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('produtos.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Tem certeza?')" class="btn btn-danger btn-sm">
                        Apagar
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">Nenhum produto encontrado.</td>
        </tr>
        @endforelse
    </tbody>
</table>
    
{{ $products->links() }}

@endsection
