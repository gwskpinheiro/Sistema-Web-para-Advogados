<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Cliente;
use App\Http\Requests\StoreCasoRequest;
use App\Http\Requests\UpdateCasoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CasoController extends Controller
{
    public function index(): View
    {
        return view('casos.index', ['casos' => Caso::with('cliente')->get()]);
    }

    public function create(): View
    {
        return view('casos.create', ['clientes' => Cliente::all()]);
    }

    public function store(StoreCasoRequest $request): RedirectResponse
    {
        Caso::create($request->validated());
        return redirect()->route('casos.index')->with('success', 'Caso criado com sucesso.');
    }

    public function show(Caso $caso): View
    {
        return view('casos.show', compact('caso'));
    }

    public function edit(Caso $caso): View
    {
        return view('casos.edit', ['caso' => $caso, 'clientes' => Cliente::all()]);
    }

    public function update(UpdateCasoRequest $request, Caso $caso): RedirectResponse
    {
        $caso->update($request->validated());
        return redirect()->route('casos.index')->with('success', 'Caso atualizado com sucesso.');
    }

    public function destroy(Caso $caso): RedirectResponse
    {
        $caso->delete();
        return redirect()->route('casos.index')->with('success', 'Caso excluído com sucesso.');
    }
}
