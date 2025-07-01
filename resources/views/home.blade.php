@extends('layouts.app')
@section('title', 'Sistema Jurídico')

@section('content')
<div class="painel-home">
    {{-- Cabeçalho --}}
    <div class="area-header text-center">
        <h2 class="text-juridico text-sombra">Sistema de Gestão Jurídica</h2>
        <p class="text-muted">Administração eficiente de clientes, casos, processos e agenda.</p>
    </div>

    {{-- Card: Acesso Rápido --}}
    <div class="area-left">
        <div class="card-custom text-center shadow-suave">
            <h6 class="text-juridico mb-3">Acesso Rápido</h6>
            <a href="{{ route('advogado.users.index') }}" class="btn btn-outline-custom w-100 mb-2">👨‍⚖️ Advogados</a>
            <a href="{{ route('advogado.clientes.index') }}" class="btn btn-outline-custom w-100">👥 Clientes</a>
        </div>
    </div>

    {{-- Card: Gestão Jurídica --}}
    <div class="area-right">
        <div class="card-custom text-center shadow-suave">
            <h6 class="text-juridico mb-3">Gestão Jurídica</h6>
            <a href="{{ route('advogado.casos.index') }}" class="btn btn-outline-custom w-100 mb-2">📁 Casos</a>
            <a href="{{ route('advogado.processos.index') }}" class="btn btn-outline-custom w-100">🧾 Processos</a>
        </div>
    </div>

    {{-- Centro: Agenda + gráfico --}}
    <div class="area-main">
        <div class="card-custom w-100 shadow-suave text-center">
            <h5 class="text-primary fw-bold mb-2">📅 Agenda</h5>
            <p class="text-muted">Compromissos e tarefas jurídicas organizadas em um só lugar.</p>
            <a href="{{ route('advogado.agenda.index') }}" class="btn btn-custom mt-2 mb-4">Acessar Agenda</a>

            <hr>
            <h6 class="text-juridico mt-3">Distribuição por Cliente</h6>
           <div class="d-flex justify-content-center">
                <canvas id="graficoCasosProcessos" width="280" height="220" style="max-width: 100%;"></canvas>
            </div>
            <div class="d-flex justify-content-center">
                <select id="clienteFiltro" class="form-select w-50 rounded-soft">
                    <option value="">Todos os clientes</option>
                    @foreach(\App\Models\Cliente::orderBy('nome')->get() as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<style>
.painel-home {
    display: grid;
    grid-template-columns: 220px 1fr 220px;
    grid-template-areas:
        "header header header"
        "left main right";
    gap: 20px;
    padding: 20px;
}

.area-header {
    grid-area: header;
}

.area-left {
    grid-area: left;
    display: flex;
    flex-direction: column;
    justify-content: start;
}

.area-right {
    grid-area: right;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: flex-end;
}

.area-main {
    grid-area: main;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.grafico-box {
    display: flex;
    justify-content: center;
}

@media (max-width: 768px) {
    .painel-home {
        grid-template-columns: 1fr;
        grid-template-areas:
            "header"
            "main"
            "left"
            "right";
    }

    .area-left,
    .area-right {
        align-items: center;
    }

    .grafico-box {
        flex-direction: column;
        align-items: center;
    }
}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let grafico;

    function carregarGrafico(clienteId = '') {
        fetch(`{{ route('advogado.graficos') }}?cliente_id=${clienteId}`)
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('graficoCasosProcessos');
                if (grafico) grafico.destroy();

                grafico = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Casos', 'Processos'],
                        datasets: [{
                            label: 'Quantidade',
                            data: [
                                data.casos.reduce((a, b) => a + b, 0),
                                data.processos.reduce((a, b) => a + b, 0)
                            ],
                            backgroundColor: [
                                'rgba(47, 128, 237, 0.7)',
                                'rgba(231, 76, 60, 0.7)'
                            ],
                            borderColor: [
                                'rgba(47, 128, 237, 1)',
                                'rgba(231, 76, 60, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                },
                                title: {
                                    display: true,
                                    text: 'Quantidade'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tipo'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        carregarGrafico();
        document.getElementById('clienteFiltro').addEventListener('change', function () {
            carregarGrafico(this.value);
        });
    });
</script>
@endsection

