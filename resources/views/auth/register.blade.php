@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4 text-primary text-center">Cadastro de Advogado</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" class="form-control" type="text" name="nome" value="{{ old('nome') }}" required autofocus />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="{{ route('login') }}" class="btn btn-link text-decoration-none">Já tem cadastro? Entrar</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
