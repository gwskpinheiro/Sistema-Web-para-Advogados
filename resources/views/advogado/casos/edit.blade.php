@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-warning">Editar Caso</h2>

    <form action="{{ route('advogado.casos.update', $caso) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $caso->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4">{{ old('descricao', $caso->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $caso->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">
            <i class="bi bi-save"></i> Atualizar
        </button>
        <a href="{{ route('advogado.casos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
