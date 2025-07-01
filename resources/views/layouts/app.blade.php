<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Jurídico') }}</title>
    <meta name="description" content="Sistema web de gestão para escritórios de advocacia.">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts e Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Libre Franklin', sans-serif;
            background-color: #f9f9fb;
        }
        footer {
            background-color: #f1f3f5;
            text-align: center;
            font-size: 0.875rem;
            padding: 1rem 0;
            color: #6c757d;
        }
    </style>
</head>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
<body>
    @include('layouts.navigation')

    @isset($header)
        <header class="bg-white border-bottom py-3 shadow-sm">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="container py-5">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} {{ config('app.name', 'Sistema Jurídico') }}. Todos os direitos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
