@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Processos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('processos.create') }}" class="btn btn-primary mb-3">Novo Processo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($processos as $processo)
                <tr>
                    <td>{{ $processo->numero_processo }}</td>
                    <td>{{ $processo->cliente->nome }}</td>
                    <td>
                        <a href="{{ route('processos.show', $processo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('processos.edit', $processo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('processos.destroy', $processo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
