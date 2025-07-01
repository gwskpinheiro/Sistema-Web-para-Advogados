@extends('layouts.app')
@section('title', 'Sistema Jurídico')

@section('content')
<div class="container py-4">
    <h2 class="text-primary text-center mb-4">Sistema de Gestão Jurídica</h2>
    <p class="text-center mb-5">Bem-vindo ao seu ambiente seguro de trabalho. Gerencie clientes, casos, processos e compromissos com eficiência.</p>

    <div class="row justify-content-center">
        <!-- Card: Advogados -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">Advogados</h5>
                    <p class="card-text">Visualize e edite perfis de advogados cadastrados no sistema.</p>
                    <a href="{{ route('advogado.users.index') }}" class="btn btn-outline-primary">Acessar</a>
                </div>
            </div>
        </div>

        <!-- Card: Clientes -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border border-success">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">Clientes</h5>
                    <p class="card-text">Gerencie os dados dos seus clientes e consulte seu histórico jurídico.</p>
                    <a href="{{ route('advogado.clientes.index') }}" class="btn btn-outline-success">Acessar</a>
                </div>
            </div>
        </div>

        <!-- Card: Casos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border border-warning">
                <div class="card-body text-center">
                    <h5 class="card-title text-warning">Casos</h5>
                    <p class="card-text">Acompanhe os casos em andamento e registre novas ocorrências.</p>
                    <a href="{{ route('advogado.casos.index') }}" class="btn btn-outline-warning">Acessar</a>
                </div>
            </div>
        </div>

        <!-- Card: Processos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border border-danger">
                <div class="card-body text-center">
                    <h5 class="card-title text-danger">Processos</h5>
                    <p class="card-text">Gerencie processos judiciais com controle completo de prazos e documentos.</p>
                    <a href="{{ route('advogado.processos.index') }}" class="btn btn-outline-danger">Acessar</a>
                </div>
            </div>
        </div>

        <!-- Card: Agenda -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border border-info">
                <div class="card-body text-center">
                    <h5 class="card-title text-info">Agenda</h5>
                    <p class="card-text">Visualize compromissos, prazos e reuniões jurídicas agendadas.</p>
                    <a href="{{ route('advogado.agenda.index') }}" class="btn btn-outline-info">Acessar</a>
                </div>
            </div>
        </div>
    </div>

   <div class="mb-4">
        <label for="clienteFiltro" class="form-label">Filtrar por Cliente:</label>
        <select id="clienteFiltro" class="form-select w-auto">
            <option value="">Todos os clientes</option>
            @foreach(\App\Models\Cliente::orderBy('nome')->get() as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
        </select>
    </div>

    {{-- GRÁFICO INTEGRADO NA HOME --}}
    <div class="mt-5">
        <h4 class="text-center mb-4">Gráfico de Casos e Processos por Cliente</h4>
        <div class="card shadow">
            <div class="card-body">
                <div id="grafico-wrapper">
                    <canvas id="graficoCasosProcessos" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let grafico;

    function carregarGrafico(clienteId = '') {
        fetch(`{{ route('advogado.graficos') }}?cliente_id=${clienteId}`)
            .then(response => response.json())
            .then(data => {
                const wrapper = document.getElementById('grafico-wrapper');
                wrapper.innerHTML = '<canvas id="graficoCasosProcessos" height="100"></canvas>';
                const ctx = document.getElementById('graficoCasosProcessos');

                if (grafico) {
                    grafico.destroy();
                }

                grafico = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: 'Casos',
                                data: data.casos,
                                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Processos',
                                data: data.processos,
                                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: { position: 'top' },
                            title: {
                                display: true,
                                text: 'Quantidade de Casos e Processos por Cliente'
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
