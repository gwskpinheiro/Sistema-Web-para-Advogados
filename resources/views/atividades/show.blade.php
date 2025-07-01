@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">💬 Atividade: {{ $atividade->titulo }}</h1>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p><strong>Descrição:</strong> {{ $atividade->descricao ?? '—' }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($atividade->tipo) }}</p>
            <p><strong>Status:</strong>
                @if($atividade->status === 'pendente')
                    <span class="badge bg-warning text-dark">Pendente</span>
                @else
                    <span class="badge bg-success">Concluída</span>
                @endif
            </p>
            <p><strong>Data:</strong> {{ $atividade->data_hora->format('d/m/Y H:i') }}</p>
            <p><strong>Responsável:</strong> {{ $atividade->user->nome ?? '-' }}</p>
            <p><strong>Criado por:</strong> {{ $atividade->autor->nome ?? '-' }}</p>
            <p><strong>Criado em:</strong> {{ $atividade->created_at->format('d/m/Y H:i') }}</p>
            @if ($atividade->updated_at != $atividade->created_at)
                <p><strong>Última atualização:</strong> {{ $atividade->updated_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>
    </div>

    {{-- Quadro de Comentários --}}
    <h4 class="mb-3">🗨️ Comentários</h4>

    @forelse ($atividade->comentarios as $comentario)
        <div class="card mb-3">
            <div class="card-body">
                <p class="mb-1">{{ $comentario->mensagem }}</p>
                <small class="text-muted">
                    — {{ $comentario->user->nome ?? 'Usuário' }}, em {{ $comentario->created_at->format('d/m/Y H:i') }}
                </small>
            </div>
        </div>
    @empty
        <p class="text-muted">Nenhum comentário até o momento.</p>
    @endforelse

    {{-- Formulário de Novo Comentário --}}
    <div class="card mt-4">
        <div class="card-body">
            <form method="POST" action="{{ route('advogado.atividades.comentarios.store', $atividade) }}">
                @csrf
                <div class="mb-3">
                    <label for="mensagem" class="form-label">Adicionar comentário *</label>
                    <textarea name="mensagem" id="mensagem" rows="3" class="form-control" required></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('advogado.agenda.index') }}" class="btn btn-outline-secondary">← Voltar</a>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
