@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">📅 Agenda de Atividades</h1>

    {{-- Filtros --}}
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Responsável</label>
            <select name="user_id" class="form-select">
                <option value="">Todos</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Tipo</label>
            <select name="tipo" class="form-select">
                <option value="">Todos</option>
                <option value="tarefa" {{ request('tipo') == 'tarefa' ? 'selected' : '' }}>Tarefa</option>
                <option value="evento" {{ request('tipo') == 'evento' ? 'selected' : '' }}>Evento</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">Todos</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Criado por</label>
            <select name="autor_id" class="form-select">
                <option value="">Todos</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ request('autor_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
        </div>
    </form>

    {{-- Tabela de Atividades --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Para</th>
                        <th>Criado por</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($atividades as $atividade)
                        <tr>
                            <td>{{ $atividade->titulo }}</td>
                            <td><span class="badge bg-secondary">{{ ucfirst($atividade->tipo) }}</span></td>
                            <td>
                                @if($atividade->status === 'pendente')
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                @else
                                    <span class="badge bg-success">Concluída</span>
                                @endif
                            </td>
                            <td>{{ $atividade->user->nome ?? '-' }}</td>
                            <td>{{ $atividade->autor->nome ?? '-' }}</td>
                            <td>{{ $atividade->data_hora->format('d/m/Y H:i') }}</td>
                            <td class="d-flex gap-2">
                                {{-- Botão concluir --}}
                                @if($atividade->status === 'pendente')
                                    <form method="POST" action="{{ route('advogado.atividades.concluir', $atividade) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success">✓</button>
                                    </form>
                                @endif

                                {{-- Editar --}}
                                <a href="{{ route('advogado.atividades.edit', $atividade) }}" class="btn btn-sm btn-outline-primary">✏️</a>

                                {{-- Ver/Comentar --}}
                                <a href="{{ route('advogado.atividades.show', $atividade) }}" class="btn btn-sm btn-outline-secondary">💬</a>

                                {{-- Excluir --}}
                                <form method="POST" action="{{ route('advogado.atividades.destroy', $atividade) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir?')">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">Nenhuma atividade encontrada.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('advogado.atividades.create') }}" class="btn btn-success">➕ Nova Atividade</a>
    </div>
</div>
@endsection
