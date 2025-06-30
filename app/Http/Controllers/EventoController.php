<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use App\Models\Caso;
use App\Models\Processo;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventoController extends Controller
{
    public function index(): View
    {
        return view('eventos.index', ['eventos' => Evento::with(['user', 'caso', 'processo'])->get()]);
    }

    public function create(): View
    {
        return view('eventos.create', [
            'users' => User::all(),
            'casos' => Caso::all(),
            'processos' => Processo::all(),
        ]);
    }

    public function store(StoreEventoRequest $request): RedirectResponse
    {
        Evento::create($request->validated());
        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso.');
    }

    public function show(Evento $evento): View
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento): View
    {
        return view('eventos.edit', [
            'evento' => $evento,
            'users' => User::all(),
            'casos' => Caso::all(),
            'processos' => Processo::all(),
        ]);
    }

    public function update(UpdateEventoRequest $request, Evento $evento): RedirectResponse
    {
        $evento->update($request->validated());
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Evento $evento): RedirectResponse
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso.');
    }
}
