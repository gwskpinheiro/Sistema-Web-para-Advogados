<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function index(Request $request): View
    {
        $query = Atividade::with(['user', 'autor'])
            ->orderBy('data_hora');

        // Filtros opcionais
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('autor_id')) {
            $query->where('autor_id', $request->autor_id);
        }

        $atividades = $query->get();
        $users = User::orderBy('nome')->get();

        return view('atividades.agenda', compact('atividades', 'users'));
    }
}
