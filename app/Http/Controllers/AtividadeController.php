<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\User;
use App\Models\Caso;
use App\Models\Processo;
use App\Models\Comentario;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AtividadeController extends Controller
{
    public function index(Request $request): View
    {
        $query = Atividade::with(['user', 'autor', 'comentarios', 'caso', 'processo']);

        // Filtros dinâmicos
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('autor_id')) {
            $query->where('autor_id', $request->autor_id);
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return view('atividades.index', [
            'atividades' => $query->latest()->get(),
            'users' => User::all(),
        ]);
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
        $data = $request->validated();
        $data['autor_id'] = Auth::id();       // quem criou
        $data['status'] = 'pendente';         // padrão

        Atividade::create($data);

        return redirect()->route('advogado.agenda.index')->with('success', 'Atividade criada com sucesso.');
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
        return redirect()->route('advogado.agenda.index')->with('success', 'Atividade atualizada com sucesso.');
    }

    public function destroy(Atividade $atividade): RedirectResponse
    {
        $atividade->delete();
        return redirect()->route('advogado.agenda.index')->with('success', 'Atividade excluída com sucesso.');
    }

    public function marcarComoConcluida(Atividade $atividade): RedirectResponse
    {
        $atividade->update(['status' => 'concluida']);
        return back()->with('success', 'Atividade marcada como concluída.');
    }

    public function adicionarComentario(Request $request, Atividade $atividade): RedirectResponse
    {
        $request->validate([
            'mensagem' => 'required|string|max:1000',
        ]);

        Comentario::create([
            'mensagem' => $request->mensagem,
            'atividade_id' => $atividade->id,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Comentário adicionado com sucesso.');
    }
}
