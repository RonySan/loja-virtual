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
        $data = $request->all();

        // 📌 Tratamento da imagem
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado!');
    }

    public function edit(Product $produto)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('produto', 'categories'));
    }

    public function update(Request $request, Product $produto)
    {
        $data = $request->all();

        // 📌 Se tiver imagem nova enviar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    public function destroy(Product $produto)
    {
        $produto->delete();
        return back()->with('success', 'Produto apagado!');
    }
}
