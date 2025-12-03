<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'nullable|exists:categories,id',
        'description' => 'nullable|string',
        'price_cents' => 'required|numeric',
        'stock' => 'required|integer',
        'active' => 'boolean',
        'images.*' => 'image|max:4096',
    ]);

    // converter reais → centavos
    $data['price_cents'] = (int) ($data['price_cents'] * 100);

    $product = Product::create($data);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('products', 'public');

            $product->images()->create([
                'path' => $path,
                'order' => $index
            ]);
        }
    }

    return redirect()->route('produtos.index')
                     ->with('success', 'Produto criado!');
}


    public function edit(Product $product)
{
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
     // ✅ Validação entra aqui também
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ]);
    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
}

public function destroy(Product $product)
{
    $product->delete();
    return back()->with('success', 'Produto apagado!');
}
}