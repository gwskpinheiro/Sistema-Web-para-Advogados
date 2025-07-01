@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success">Novo Cliente</h2>

    {{-- Exibe erros de validação --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('advogado.clientes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" class="form-control" value="{{ old('cpf_cnpj') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" class="form-control">{{ old('endereco') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Salvar
        </button>
        <a href="{{ route('advogado.clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
