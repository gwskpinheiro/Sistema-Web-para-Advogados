@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success">Novo Advogado</h2>

    <form action="{{ route('advogado.users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone (opcional)</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Salvar
        </button>
        <a href="{{ route('advogado.users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
