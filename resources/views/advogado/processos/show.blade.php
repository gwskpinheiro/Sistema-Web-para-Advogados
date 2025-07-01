@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-info">Detalhes do Processo</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">{{ $processo->numero_processo }}</h4>
            <p><strong>Cliente:</strong> {{ $processo->cliente->nome }}</p>
            <p><strong>Descrição:</strong> {{ $processo->descricao ?? '—' }}</p>
            <p><strong>Criado em:</strong> {{ $processo->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('advogado.processos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
