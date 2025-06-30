@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Sistema de Gestão Jurídica</h2>
        <p class="text-muted fs-5">Bem-vindo ao seu ambiente seguro de trabalho. Gerencie clientes, casos, processos e compromissos com eficiência.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-xl-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-person-badge fs-2 text-primary mb-2"></i>
                    <h5 class="card-title">Advogados</h5>
                    <p class="text-muted small">Visualize e edite perfis de advogados cadastrados no sistema.</p>
                    <a href="{{ route('advogado.users.index') }}" class="btn btn-outline-primary w-100">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-2 text-success mb-2"></i>
                    <h5 class="card-title">Clientes</h5>
                    <p class="text-muted small">Gerencie os dados dos seus clientes e consulte seu histórico jurídico.</p>
                    <a href="{{ route('advogado.clientes.index') }}" class="btn btn-outline-success w-100">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-folder2-open fs-2 text-warning mb-2"></i>
                    <h5 class="card-title">Casos</h5>
                    <p class="text-muted small">Acompanhe os casos em andamento e registre novas ocorrências.</p>
                    <a href="{{ route('advogado.casos.index') }}" class="btn btn-outline-warning w-100 text-dark">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-text fs-2 text-danger mb-2"></i>
                    <h5 class="card-title">Processos</h5>
                    <p class="text-muted small">Gerencie processos judiciais com controle completo de prazos e documentos.</p>
                    <a href="{{ route('advogado.processos.index') }}" class="btn btn-outline-danger w-100">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-event fs-2 text-info mb-2"></i>
                    <h5 class="card-title">Agenda</h5>
                    <p class="text-muted small">Visualize compromissos, prazos e reuniões jurídicas agendadas.</p>
                    <a href="{{ route('advogado.agenda.index') }}" class="btn btn-outline-info w-100">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
