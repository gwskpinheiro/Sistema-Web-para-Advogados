<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Sistema Jurídico'))</title>
    <meta name="description" content="Sistema web de gestão para escritórios de advocacia.">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts e Estilos -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Libre Franklin', sans-serif;
            background-color: #f9fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 2rem 1rem;
        }

        footer {
            background-color: #f0f2f5;
            text-align: center;
            font-size: 0.875rem;
            color: #6c757d;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
        }

        header.navbar-top {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .container-fluid {
            max-width: 1440px;
        }

        .nav-logo {
            font-weight: 700;
            font-size: 1.25rem;
            color: #2c3e50;
            text-decoration: none;
        }

        .nav-logo:hover {
            color: #1d3557;
        }
    </style>
</head>

<body>
    {{-- Navegação superior --}}
    <header class="navbar-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="{{ route('advogado.home') }}" class="nav-logo">
                ⚖️ Sistema Jurídico
            </a>

            <div>
                @auth
                    <span class="text-muted me-3">Olá, {{ Auth::user()->nome }}</span>
                @endauth
                <a href="{{ route('logout') }}" 
                   class="btn btn-sm btn-outline-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sair <i class="bi bi-box-arrow-right"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    {{-- Conteúdo --}}
    <main class="container-fluid">
        @yield('content')
    </main>

    {{-- Rodapé --}}
    <footer>
        &copy; {{ date('Y') }} {{ config('app.name', 'Sistema Jurídico') }}. Todos os direitos reservados.
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @yield('scripts')
</body>
</html>
