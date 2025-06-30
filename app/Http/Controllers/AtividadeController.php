<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\User;
use App\Models\Caso;
use App\Models\Processo;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AtividadeController extends Controller
{
    public function index(): View
    {
        return view('atividades.index', ['atividades' => Atividade::with(['user', 'caso', 'processo'])->get()]);
    }

    public function create(): View
    {
        return view('atividades.create', [
            'users' => User::all(),
            'casos' => Caso::all(),
            'processos' => Processo::all(),
        ]);
    }

    public function store(StoreAtividadeRequest $request): RedirectResponse
    {
        Atividade::create($request->validated());
        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso.');
    }

    public function show(Atividade $atividade): View
    {
        return view('atividades.show', compact('atividade'));
    }

    public function edit(Atividade $atividade): View
    {
        return view('atividades.edit', [
            'atividade' => $atividade,
            'users' => User::all(),
            'casos' => Caso::all(),
            'processos' => Processo::all(),
        ]);
    }

    public function update(UpdateAtividadeRequest $request, Atividade $atividade): RedirectResponse
    {
        $atividade->update($request->validated());
        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso.');
    }

    public function destroy(Atividade $atividade): RedirectResponse
    {
        $atividade->delete();
        return redirect()->route('atividades.index')->with('success', 'Atividade excluída com sucesso.');
    }
}
