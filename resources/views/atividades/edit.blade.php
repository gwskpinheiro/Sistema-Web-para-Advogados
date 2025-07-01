@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">✏️ Editar Atividade</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('advogado.atividades.update', $atividade) }}">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div class="mb-3">
            <label for="titulo" class="form-label">Título *</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $atividade->titulo) }}" required>
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4" class="form-control">{{ old('descricao', $atividade->descricao) }}</textarea>
        </div>

        {{-- Data e Hora --}}
        <div class="mb-3">
            <label for="data_hora" class="form-label">Data e Hora *</label>
            <input type="datetime-local" name="data_hora" id="data_hora" class="form-control"
                   value="{{ old('data_hora', \Carbon\Carbon::parse($atividade->data_hora)->format('Y-m-d\TH:i')) }}" required>
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo *</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="tarefa" {{ old('tipo', $atividade->tipo) == 'tarefa' ? 'selected' : '' }}>Tarefa</option>
                <option value="evento" {{ old('tipo', $atividade->tipo) == 'evento' ? 'selected' : '' }}>Evento</option>
            </select>
        </div>

        {{-- Responsável --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">Responsável *</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $atividade->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Caso --}}
        <div class="mb-3">
            <label for="caso_id" class="form-label">Caso (opcional)</label>
            <select name="caso_id" id="caso_id" class="form-select">
                <option value="">-- Nenhum --</option>
                @foreach ($casos as $caso)
                    <option value="{{ $caso->id }}" {{ old('caso_id', $atividade->caso_id) == $caso->id ? 'selected' : '' }}>
                        {{ $caso->titulo ?? 'Caso #' . $caso->id }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Processo --}}
        <div class="mb-3">
            <label for="processo_id" class="form-label">Processo (opcional)</label>
            <select name="processo_id" id="processo_id" class="form-select">
                <option value="">-- Nenhum --</option>
                @foreach ($processos as $processo)
                    <option value="{{ $processo->id }}" {{ old('processo_id', $atividade->processo_id) == $processo->id ? 'selected' : '' }}>
                        {{ $processo->numero ?? 'Processo #' . $processo->id }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status *</label>
            <select name="status" id="status" class="form-select" required>
                <option value="pendente" {{ old('status', $atividade->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluida" {{ old('status', $atividade->status) == 'concluida' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('advogado.agenda.index') }}" class="btn btn-outline-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>
@endsection
