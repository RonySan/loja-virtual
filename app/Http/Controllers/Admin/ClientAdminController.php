<?php
 namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('admin.clients.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('admin.clients.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Cliente removido com sucesso!');
    }
}
