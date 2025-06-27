@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Advogado</h1>

    <p><strong>Nome:</strong> {{ $user->nome }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Telefone:</strong> {{ $user->telefone }}</p>

    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
