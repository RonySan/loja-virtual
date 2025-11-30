<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Checkout</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        @if(!count($cart))
            <div class="p-6 bg-white shadow rounded">Seu carrinho está vazio.</div>
        @else
            <form action="{{ route('checkout.store') }}" method="POST" class="bg-white p-6 rounded shadow">
                @csrf
                <h3 class="text-lg font-semibold mb-4">Resumo do pedido</h3>
                @php $total = collect($cart)->sum(fn($i) => $i['qty'] * $i['price_cents']); @endphp
                <p class="mb-4">Total: R$ {{ number_format($total/100,2,',','.') }}</p>

                <!-- Simplificado: endereço de entrega básico -->
                <div class="mb-4">
                    <label class="block mb-1">Endereço</label>
                    <input type="text" name="address" class="w-full border rounded px-3 py-2" required>
                </div>

                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Confirmar pedido (modo teste)</button>
            </form>
        @endif
    </div>
</x-app-layout>
