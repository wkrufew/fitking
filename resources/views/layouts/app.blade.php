<!DOCTYPE html>
<html lang="es">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- icono de la app -->
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('img/home/logo4.webp') }}" type="image/x-icon">
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css') }}"integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css') }}"/> --}}
    @stack('css')
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js') }}"
        integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

    <title>{{ $settings['shopname'] }} - @yield('title')</title>
    {{-- SEO --}}
        {{-- <title>{{ $settings['shopname'] }} - @yield('title')</title>
        <meta name="robots" content="index, follow">
        <meta name="author" content="STALIN PHILCO">
        <meta name="description" content="@yield('description', '')">

        <meta property="og:title" content="{{ $settings['shopname'] }} - @yield('title', 'Inicio')">
        <meta property="og:type" content="article">
        <meta property="og:description" content="@yield('description', '')">
        <meta property="og:url" content="@yield('url', config('app.url'))">
        <meta property="og:img" content="@yield('img', asset('img/home/sports.jpg'))">
        <meta property="og:site_name" content="{{ $settings['shopname'] }}"/>
        <meta name="keywords" content="FITKING, KINGBARBER, BARBERIA KING, VENTAS DE PRODUCTOS FITNESS, FITNESS, ENTENAMIENTOS PERSONALIZADOS, EJERCICIOS, GYM, INSTRUCTOR"> --}}
    {{-- FIN DEL SEO --}}
</head>

<body class="font-sans antialiased">
    {{-- <x-jet-banner /> --}}
    <div class="min-h-screen bg-white">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Pie de pagina  -->
    <x-footer />
    @stack('modals')
    @livewireScripts
    {{-- @isset($js)
        {{ $js }}
    @endisset --}}
    @stack('js')
    <script>
        /* @if (Session::has('mensaje2'))
            Swal.fire({
                position: 'top-end',
                width: 400,
                toast: true,
                timerProgressBar: true,
                icon: 'success',
                title: 'Datos guardados!',
                showConfirmButton: false,
                timer: 4000
            })
        @endif */
        //esto es para el smooth    
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>
</body>

</html>
