@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">📅 Agenda do Escritório</h1>

    @forelse($agenda as $data => $atividades)
        <h5 class="mt-4">{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</h5>
        <ul class="list-group mb-3">
            @foreach ($atividades as $item)
                <li class="list-group-item">
                    <strong>{{ $item['hora'] }}</strong> – 
                    <span class="text-muted">{{ $item['tipo'] }}:</span> 
                    {{ $item['titulo'] }} <br>
                    <small>Responsável: {{ $item['user'] }} | Cliente: {{ $item['cliente'] }}</small>
                </li>
            @endforeach
        </ul>
    @empty
        <div class="alert alert-info">Nenhuma atividade encontrada.</div>
    @endforelse

    <a href="{{ route('advogado.atividades.index') }}" class="btn btn-outline-primary">← Voltar para Atividades</a>
</div>
@endsection
