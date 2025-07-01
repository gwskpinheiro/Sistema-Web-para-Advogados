@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">➕ Nova Atividade</h1>

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

    <form method="POST" action="{{ route('advogado.atividades.store') }}">
        @csrf

        {{-- Título --}}
        <div class="mb-3">
            <label for="titulo" class="form-label">Título da Atividade *</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        {{-- Descrição --}}
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4" class="form-control">{{ old('descricao') }}</textarea>
        </div>

        {{-- Data e Hora --}}
        <div class="mb-3">
            <label for="data_hora" class="form-label">Data e Hora *</label>
            <input type="datetime-local" name="data_hora" id="data_hora" class="form-control" value="{{ old('data_hora') }}" required>
        </div>

        {{-- Tipo --}}
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Atividade *</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="">-- Selecione --</option>
                <option value="tarefa" {{ old('tipo') == 'tarefa' ? 'selected' : '' }}>Tarefa</option>
                <option value="evento" {{ old('tipo') == 'evento' ? 'selected' : '' }}>Evento</option>
            </select>
        </div>

        {{-- Responsável (user_id) --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">Responsável *</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Selecione --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Caso (opcional) --}}
        <div class="mb-3">
            <label for="caso_id" class="form-label">Caso (opcional)</label>
            <select name="caso_id" id="caso_id" class="form-select">
                <option value="">-- Nenhum --</option>
                @foreach ($casos as $caso)
                    <option value="{{ $caso->id }}" {{ old('caso_id') == $caso->id ? 'selected' : '' }}>
                        {{ $caso->titulo ?? 'Caso #' . $caso->id }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Processo (opcional) --}}
        <div class="mb-3">
            <label for="processo_id" class="form-label">Processo (opcional)</label>
            <select name="processo_id" id="processo_id" class="form-select">
                <option value="">-- Nenhum --</option>
                @foreach ($processos as $processo)
                    <option value="{{ $processo->id }}" {{ old('processo_id') == $processo->id ? 'selected' : '' }}>
                        {{ $processo->numero ?? 'Processo #' . $processo->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('advogado.agenda.index') }}" class="btn btn-outline-secondary">← Cancelar</a>
            <button type="submit" class="btn btn-success">Salvar Atividade</button>
        </div>
    </form>
</div>
@endsection
