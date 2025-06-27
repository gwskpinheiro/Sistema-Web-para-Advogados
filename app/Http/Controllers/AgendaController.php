<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Atividade;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class AgendaController extends Controller
{
    public function index(): View
    {
        $eventos = Evento::with(['user', 'caso', 'processo'])->get();
        $atividades = Atividade::with(['user', 'caso', 'processo'])->get();

        $itens = $eventos->map(function ($evento) {
            return [
                'tipo' => 'Evento',
                'titulo' => $evento->titulo,
                'descricao' => $evento->descricao,
                'data' => $evento->data_hora->format('Y-m-d'),
                'hora' => $evento->data_hora->format('H:i'),
                'user' => $evento->user->nome ?? '',
                'cliente' => $evento->caso->cliente->nome ?? $evento->processo->cliente->nome ?? '',
            ];
        })->merge($atividades->map(function ($atividade) {
            return [
                'tipo' => 'Atividade',
                'titulo' => $atividade->titulo,
                'descricao' => $atividade->descricao,
                'data' => $atividade->data_hora->format('Y-m-d'),
                'hora' => $atividade->data_hora->format('H:i'),
                'user' => $atividade->user->nome ?? '',
                'cliente' => $atividade->caso->cliente->nome ?? $atividade->processo->cliente->nome ?? '',
            ];
        }));

        $agenda = $itens->sortBy('data')->groupBy('data');

        return view('agenda.index', compact('agenda'));
    }
}
