@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="alert alert-primary">
        Bem-vindo ao Sistema Web para Advogados!
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100">Advogados</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-primary w-100">Clientes</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('casos.index') }}" class="btn btn-outline-primary w-100">Casos</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('processos.index') }}" class="btn btn-outline-primary w-100">Processos</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('agenda.index') }}" class="btn btn-outline-secondary w-100">Agenda</a>
        </div>
    </div>
</div>
@endsection
