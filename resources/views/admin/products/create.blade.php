@extends('admin.layouts.app')

@section('title', 'Criar Produto')

@section('content')

<h1>Criar Produto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops!</strong> Existem erros no formulário.
    </div>
@endif
<form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="category_id" class="form-control">
            <option value="">Selecione</option>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço (em reais)</label>
        <input type="number" step="0.01" name="price_cents" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Estoque</label>
        <input type="number" name="stock" class="form-control" required value="0">
    </div>

    <div class="mb-3">
        <label class="form-label">Imagens (pode selecionar várias)</label>
        <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
