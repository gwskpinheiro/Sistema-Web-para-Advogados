@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Processos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('advogado.processos.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Novo Processo
    </a>

    <table class="table table-bordered align-middle shadow-sm">
        <thead class="table-light">
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($processos as $processo)
                <tr>
                    <td>{{ $processo->numero_processo }}</td>
                    <td>{{ $processo->cliente->nome }}</td>
                    <td>{{ $processo->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('advogado.processos.show', $processo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('advogado.processos.edit', $processo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('advogado.processos.destroy', $processo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este processo?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
