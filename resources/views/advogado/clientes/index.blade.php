@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Clientes</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('advogado.clientes.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Novo Cliente
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf_cnpj }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('advogado.clientes.show', $cliente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('advogado.clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('advogado.clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Nenhum cliente encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
