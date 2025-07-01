@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Casos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('advogado.casos.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Novo Caso
    </a>

    <table class="table table-bordered align-middle shadow-sm">
        <thead class="table-light">
            <tr>
                <th>Título</th>
                <th>Cliente</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casos as $caso)
                <tr>
                    <td>{{ $caso->titulo }}</td>
                    <td>{{ $caso->cliente->nome }}</td>
                    <td>{{ $caso->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('advogado.casos.show', $caso) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('advogado.casos.edit', $caso) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('advogado.casos.destroy', $caso) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este caso?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
