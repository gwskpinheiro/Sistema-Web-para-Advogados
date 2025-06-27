@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Caso</h1>

    <form action="{{ route('casos.update', $caso) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $caso->titulo) }}">
            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao', $caso->descricao) }}</textarea>
            @error('descricao') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $caso->cliente_id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
            @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('casos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
