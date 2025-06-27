@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Processo</h1>

    <form action="{{ route('processos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="numero_processo" class="form-label">Número do Processo</label>
            <input type="text" name="numero_processo" class="form-control @error('numero_processo') is-invalid @enderror" value="{{ old('numero_processo') }}">
            @error('numero_processo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>
            @error('descricao') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                <option value="">Selecione...</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
            @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('processos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
