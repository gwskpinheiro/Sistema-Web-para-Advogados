@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Processo</h1>

    <p><strong>Número:</strong> {{ $processo->numero_processo }}</p>
    <p><strong>Descrição:</strong> {{ $processo->descricao }}</p>
    <p><strong>Cliente:</strong> {{ $processo->cliente->nome }}</p>

    <a href="{{ route('processos.edit', $processo) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('processos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
