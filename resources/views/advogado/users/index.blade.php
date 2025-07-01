@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Lista de Advogados</h2>
        <a href="{{ route('advogado.users.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Novo Advogado
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered shadow-sm rounded">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telefone ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('advogado.users.show', $user) }}" class="btn btn-sm btn-outline-info">Ver</a>
                        <a href="{{ route('advogado.users.edit', $user) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                        <form action="{{ route('advogado.users.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja excluir este advogado?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum advogado cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
