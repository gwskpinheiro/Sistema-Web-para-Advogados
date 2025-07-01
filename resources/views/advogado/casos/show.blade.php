@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-info">Detalhes do Caso</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">{{ $caso->titulo }}</h4>
            <p><strong>Cliente:</strong> {{ $caso->cliente->nome }}</p>
            <p><strong>Descrição:</strong> {{ $caso->descricao ?? '—' }}</p>
            <p><strong>Criado em:</strong> {{ $caso->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('advogado.casos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
