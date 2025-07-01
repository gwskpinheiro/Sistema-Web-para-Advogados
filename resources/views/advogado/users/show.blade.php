@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Detalhes do Advogado</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $user->nome }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Telefone:</strong> {{ $user->telefone ?? 'Não informado' }}</p>
        </div>
    </div>

    <a href="{{ route('advogado.users.index') }}" class="btn btn-outline-primary mt-4">Voltar à lista</a>
</div>
@endsection
