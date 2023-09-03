<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- icono de la app -->
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('img/home/logo4.webp') }}" type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}"integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Scripts -->
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js') }}" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    {{-- FIN SCRIPTS --}}
    {{-- SEO --}}
        <title>{{ $settings['shopname'] }} @yield('title')</title>
        {{-- <meta name="robots" content="index, follow">
        <meta name="author" content="STALIN PHILCO">
        <meta name="description" content="@yield('description', '')">
        <meta property="og:title" content="{{ $settings['shopname'] }} @yield('title'/* , 'Inicio' */)">
        <meta property="og:type" content="article">
        <meta property="og:description" content="@yield('description', '')">
        <meta property="og:url" content="@yield('url', config('app.url'))">
        <meta property="og:image" content="@yield('img', asset('img/home/sports.jpg'))">
        <meta property="og:site_name" content="{{ $settings['shopname'] }}" />
        <meta name="keywords" content="FITKING, KINGBARBER, BARBERIA KING, VENTAS DE PRODUCTOS FITNESS, FITNESS, ENTENAMIENTOS PERSONALIZADOS, EJERCICIOS, GYM, INSTRUCTOR"> --}}
    {{-- FIN DEL SEO --}}
</head>
<body id="content" class="font-sans antialiased fade hide">
    <x-alerta-internet/>
    <x-loading message="Cargando..."/>
    <div class="min-h-screen bg-white">
        @livewire('navigation-menu')
        <!-- CONTENIDO RPINCIPAL DE LA PAGINA -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <x-footer />
    @stack('modals')
    @livewireScripts
    @stack('js')
</body>
</html>
