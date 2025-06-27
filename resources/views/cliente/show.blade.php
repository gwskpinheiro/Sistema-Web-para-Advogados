@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Cliente</h1>

    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>CPF/CNPJ:</strong> {{ $cliente->cpf_cnpj }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
    <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>

    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
