<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data['slug'] = Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id);

    $category->name = $request->name;
    $category->slug = \Str::slug($request->name);
    $category->save();

    return redirect()->route('admin.categories.index') // ou ->route('categorias.index') dependendo do seu nome de rota
        ->with('success', 'Category updated successfully!');
}


    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
