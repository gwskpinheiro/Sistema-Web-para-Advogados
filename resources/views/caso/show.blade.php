@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Caso</h1>

    <p><strong>Título:</strong> {{ $caso->titulo }}</p>
    <p><strong>Descrição:</strong> {{ $caso->descricao }}</p>
    <p><strong>Cliente:</strong> {{ $caso->cliente->nome }}</p>

    <a href="{{ route('casos.edit', $caso) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('casos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
