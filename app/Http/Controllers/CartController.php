<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'qty' => 1,
                'price_cents' => $product->price_cents
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
    }
}
