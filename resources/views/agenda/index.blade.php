@extends('layouts.app')

@section('title', 'Agenda')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-juridico text-sombra mb-0">📅 Agenda do Escritório</h2>
        <a href="{{ route('advogado.atividades.index') }}" class="btn btn-outline-custom">
            ← Voltar para Atividades
        </a>
    </div>

    @forelse($agenda as $data => $atividades)
        <div class="mb-4">
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-calendar-week text-secondary me-2" style="font-size: 1.3rem;"></i>
                <h5 class="text-primary fw-bold mb-0">{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</h5>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-3">
                @foreach ($atividades as $item)
                    <div class="col">
                        <div class="card-custom shadow-suave h-100 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge px-3 py-2 rounded-pill bg-dark">
                                    {{ $item['hora'] }}
                                </span>
                                <span class="badge rounded-pill px-3 py-2"
                                      style="background-color: {{ match(strtolower($item['tipo'])) {
                                          'reunião' => '#2f80ed',
                                          'prazo' => '#e67e22',
                                          'audiência' => '#27ae60',
                                          default => '#7f8c8d'
                                      }}}; color: #fff;">
                                    {{ ucfirst($item['tipo']) }}
                                </span>
                            </div>

                            <h6 class="fw-semibold mb-1">
                                <i class="bi bi-chat-left-text me-1 text-muted"></i>
                                {{ $item['titulo'] }}
                            </h6>

                            <div class="text-muted small mt-2">
                                <div>
                                    <i class="bi bi-person-fill me-1"></i>
                                    <strong>Responsável:</strong> {{ $item['user'] }}
                                </div>
                                <div>
                                    <i class="bi bi-briefcase-fill me-1"></i>
                                    <strong>Cliente:</strong> {{ $item['cliente'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">Nenhuma atividade encontrada.</div>
    @endforelse
</div>
@endsection
