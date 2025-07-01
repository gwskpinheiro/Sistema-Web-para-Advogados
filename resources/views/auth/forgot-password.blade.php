@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4 text-center text-primary">Recuperar Senha</h2>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Enviar link de redefinição
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">Voltar ao login</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
