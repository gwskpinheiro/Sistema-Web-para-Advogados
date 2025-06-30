@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror"
                   type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror"
                   type="password" name="password" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Lembrar login
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Entrar</button>

        <div class="mt-3 text-center">
            <a href="{{ route('password.request') }}" class="text-sm text-muted">Esqueceu sua senha?</a>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">
                Ainda não tem uma conta? Cadastre-se
            </a>
        </div>
    </form>
</div>
@endsection
