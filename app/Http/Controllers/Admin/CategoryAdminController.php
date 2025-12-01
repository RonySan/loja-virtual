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

    return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
}

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

   public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $data['slug'] = Str::slug($data['name']); // Atualiza também o slug

    $category = Category::findOrFail($id);
    $category->update($data);

    return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
}


    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }

}
