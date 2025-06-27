@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agenda</h1>

    {{-- Filtros visuais simulados (sem lógica ainda) --}}
    <div class="d-flex gap-2 mb-4 flex-wrap">
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Tipo
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Todos</a></li>
                <li><a class="dropdown-item" href="#">Eventos</a></li>
                <li><a class="dropdown-item" href="#">Atividades</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Responsável
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Todos</a></li>
                <li><a class="dropdown-item" href="#">Você</a></li>
                {{-- futuros usuários dinâmicos --}}
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Cliente / Processo
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Todos</a></li>
                {{-- futuros clientes/processos dinâmicos --}}
            </ul>
        </div>
    </div>

    {{-- Lista agrupada por data --}}
    @foreach($agenda as $data => $itens)
        <div class="mb-4">
            <h5 class="text-muted">{{ \Carbon\Carbon::parse($data)->translatedFormat('d \d\e F \d\e Y') }}</h5>

            @foreach($itens as $item)
                <div class="list-group-item bg-light rounded shadow-sm mb-2">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="badge bg-{{ $item['tipo'] === 'Evento' ? 'info text-dark' : 'success text-white' }}">{{ $item['tipo'] }}</span>
                            <strong class="ms-2">{{ $item['titulo'] }}</strong><br>
                            <small>Responsável: {{ $item['user'] }}</small><br>
                            <small>Cliente: {{ $item['cliente'] }}</small>
                        </div>
                        <div>
                            <small class="text-muted">{{ $item['hora'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
