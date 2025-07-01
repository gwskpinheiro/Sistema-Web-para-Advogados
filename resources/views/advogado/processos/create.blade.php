@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success">Novo Processo</h2>

    <form action="{{ route('advogado.processos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="numero_processo" class="form-label">Número do Processo</label>
            <input type="text" name="numero_processo" class="form-control" value="{{ old('numero_processo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select" required>
                <option value="">Selecione o cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Salvar
        </button>
        <a href="{{ route('advogado.processos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
