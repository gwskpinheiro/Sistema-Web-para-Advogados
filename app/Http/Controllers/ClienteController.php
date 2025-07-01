<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(): View
    {
        return view('advogado.clientes.index', ['clientes' => Cliente::all()]);
    }

    public function create(): View
    {
        return view('advogado.clientes.create');
    }

    public function store(StoreClienteRequest $request): RedirectResponse
    {
        Cliente::create($request->validated());
        return redirect()->route('advogado.clientes.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Cliente $cliente): View
    {
        return view('advogado.clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente): View
    {
        return view('advogado.clientes.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated());
        return redirect()->route('advogado.clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('advogado.clientes.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
