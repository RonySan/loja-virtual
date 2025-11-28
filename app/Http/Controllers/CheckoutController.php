<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (!$cart) {
            return back()->with('error', 'Carrinho vazio!');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['qty'] * $item['price_cents'];
        });

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_cents' => $total,
            'status' => 'pending',
            'payment_method' => 'not_defined'
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'qty' => $item['qty'],
                'unit_price_cents' => $item['price_cents']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Pedido realizado com sucesso!');
    }
}
