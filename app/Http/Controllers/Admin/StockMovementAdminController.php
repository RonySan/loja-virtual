<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementAdminController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with('product')->latest()->paginate(20);

        return view('admin.stock.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('admin.stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type'       => 'required|in:in,out',
            'quantity'   => 'required|integer|min:1',
            'notes'      => 'nullable|string|max:255',
        ]);

        StockMovement::create($data);

        return redirect()
            ->route('admin.stock.index')
            ->with('success', 'Stock movement registered!');
    }
}
