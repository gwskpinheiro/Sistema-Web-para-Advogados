<?php

namespace App\Http\Controllers\Advogado;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;

class GraficoController extends Controller
{
    public function index(): JsonResponse
    {
        $clienteId = request('cliente_id');

        if ($clienteId) {
            $cliente = Cliente::withCount(['casos', 'processos'])->find($clienteId);
            if (!$cliente) {
                return response()->json(['labels' => [], 'casos' => [], 'processos' => []]);
            }

            return response()->json([
                'labels' => [$cliente->nome],
                'casos' => [$cliente->casos_count],
                'processos' => [$cliente->processos_count],
            ]);
        }

        // Sem filtro → retorna todos
        $clientes = Cliente::withCount(['casos', 'processos'])->get();

        return response()->json([
            'labels' => $clientes->pluck('nome'),
            'casos' => $clientes->pluck('casos_count'),
            'processos' => $clientes->pluck('processos_count'),
        ]);
    }
}
