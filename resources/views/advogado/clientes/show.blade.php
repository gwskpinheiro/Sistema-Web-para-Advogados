@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-info">Detalhes do Cliente</h2>

    <div class="mb-3">
        <strong>Nome:</strong> {{ $cliente->nome }}
    </div>

    <div class="mb-3">
        <strong>Email:</strong> {{ $cliente->email }}
    </div>

    <div class="mb-3">
        <strong>Telefone:</strong> {{ $cliente->telefone }}
    </div>

    <a href="{{ route('advogado.clientes.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>
@endsection
