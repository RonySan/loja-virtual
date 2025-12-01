@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-semibold mb-4">Cadastrar Produto</h2>

    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Nome</label>
        <input type="text" name="name" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Categoria</label>
        <select name="category_id" class="w-full border p-2 mb-4" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label class="block mb-2">Preço</label>
        <input type="number" step="0.01" name="price" class="w-full border p-2 mb-4" required>

        <label class="block mb-2">Descrição</label>
        <textarea name="description" class="w-full border p-2 mb-4"></textarea>

        <label class="block mb-2">Imagem</label>
        <input type="file" name="image" class="mb-4">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Salvar
        </button>
    </form>
</div>
@endsection
