@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-warning">Editar Cliente</h2>

    <form action="{{ route('advogado.clientes.update', $cliente) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" class="form-control" value="{{ old('cpf_cnpj', $cliente->cpf_cnpj) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" class="form-control">{{ old('endereco', $cliente->endereco) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">
            <i class="bi bi-save"></i> Atualizar
        </button>
        <a href="{{ route('advogado.clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
