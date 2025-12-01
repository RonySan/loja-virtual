@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-semibold mb-4">Editar Produto</h2>

    <form action="{{ route('produtos.update', $produto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block mb-2">Nome</label>
        <input type="text" name="name" value="{{ $produto->name }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Categoria</label>
        <select name="category_id" class="w-full border p-2 mb-4" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $produto->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label class="block mb-2">Preço</label>
        <input type="number" step="0.01" name="price" value="{{ $produto->price }}" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Descrição</label>
        <textarea name="description" class="w-full border p-2 mb-4">{{ $produto->description }}</textarea>

        <label class="block mb-2">Imagem Atual</label>
        @if($produto->image)
            <img src="{{ asset('storage/' . $produto->image) }}" width="100" class="mb-4">
        @endif

        <label class="block mb-2">Nova Imagem</label>
        <input type="file" name="image" class="mb-4">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Atualizar
        </button>
    </form>
</div>
@endsection
