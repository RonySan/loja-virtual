@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')

<h1>Editar Produto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Existem erros no formulário.
    </div>
@endif

<form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" required value="{{ $produto->name }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="category_id" class="form-control" required>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}" {{ $produto->category_id == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control">{{ $produto->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço (em reais)</label>
        <input type="number" step="0.01" name="price" class="form-control"
            value="{{ $produto->price_cents / 100 }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Estoque</label>
        <input type="number" name="stock" class="form-control" value="{{ $produto->stock }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem atual</label><br>
        @if ($produto->image)
            <img src="{{ asset('storage/' . $produto->image) }}" width="120">
        @else
            <p>Nenhuma imagem enviada.</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Nova imagem (opcional)</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <button class="btn btn-success">Salvar Alterações</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
