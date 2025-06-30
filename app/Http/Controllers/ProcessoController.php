<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use App\Models\Cliente;
use App\Http\Requests\StoreProcessoRequest;
use App\Http\Requests\UpdateProcessoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProcessoController extends Controller
{
    public function index(): View
    {
        return view('processos.index', ['processos' => Processo::with('cliente')->get()]);
    }

    public function create(): View
    {
        return view('processos.create', ['clientes' => Cliente::all()]);
    }

    public function store(StoreProcessoRequest $request): RedirectResponse
    {
        Processo::create($request->validated());
        return redirect()->route('processos.index')->with('success', 'Processo criado com sucesso.');
    }

    public function show(Processo $processo): View
    {
        return view('processos.show', compact('processo'));
    }

    public function edit(Processo $processo): View
    {
        return view('processos.edit', ['processo' => $processo, 'clientes' => Cliente::all()]);
    }

    public function update(UpdateProcessoRequest $request, Processo $processo): RedirectResponse
    {
        $processo->update($request->validated());
        return redirect()->route('processos.index')->with('success', 'Processo atualizado com sucesso.');
    }

    public function destroy(Processo $processo): RedirectResponse
    {
        $processo->delete();
        return redirect()->route('processos.index')->with('success', 'Processo excluído com sucesso.');
    }
}
