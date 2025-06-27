@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Casos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('casos.create') }}" class="btn btn-primary mb-3">Novo Caso</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Cliente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casos as $caso)
                <tr>
                    <td>{{ $caso->titulo }}</td>
                    <td>{{ $caso->cliente->nome }}</td>
                    <td>
                        <a href="{{ route('casos.show', $caso) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('casos.edit', $caso) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('casos.destroy', $caso) }}" method="POST" style="display:inline;">
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
