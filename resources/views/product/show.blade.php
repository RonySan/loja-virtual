<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="col-span-1">
                <!-- imagem principal (placeholder) -->
                <div class="border p-4">
                    <img src="{{ asset('storage/' . ($product->images()->first()->path ?? 'placeholder.png')) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                </div>
            </div>

            <div class="col-span-2">
                <h3 class="text-2xl font-bold mb-2">{{ $product->name }}</h3>
                <p class="mb-4">{{ $product->description }}</p>
                <p class="text-xl font-semibold mb-4">R$ {{ $product->price }}</p>
                <p class="mb-4">Estoque: {{ $product->stock }}</p>

                <form action="{{ route('cart.add') }}" method="POST" class="flex items-center gap-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Adicionar ao carrinho</button>
                    <a href="{{ route('home') }}" class="px-4 py-2 border rounded">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
