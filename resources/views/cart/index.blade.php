<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Carrinho</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6">
        @if(!count($cart))
            <div class="p-6 bg-white shadow rounded">Seu carrinho está vazio.</div>
        @else
            <div class="bg-white shadow rounded p-4">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th>Produto</th>
                            <th>Qtd</th>
                            <th>Preço unit.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php $subtotal = $item['qty'] * $item['price_cents']; $total += $subtotal; @endphp
                            <tr>
                                <td class="py-2">{{ $item['name'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>R$ {{ number_format($item['price_cents'] / 100, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($subtotal / 100, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 text-right">
                    <p class="text-lg font-bold">Total: R$ {{ number_format($total / 100, 2, ',', '.') }}</p>
                    <a href="{{ route('checkout.show') }}" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded">Finalizar compra</a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
