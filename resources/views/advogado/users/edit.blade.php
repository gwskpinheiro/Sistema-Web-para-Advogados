@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-warning">Editar Advogado</h2>

    <form action="{{ route('advogado.users.update', $user) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}">
        </div>

        <button type="submit" class="btn btn-warning">
            <i class="bi bi-save"></i> Atualizar
        </button>
        <a href="{{ route('advogado.users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
