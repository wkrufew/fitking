<!DOCTYPE html>
<html lang="es">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FitKing') }}</title>
    <!-- icono de la app -->
    <link rel="shortcut icon" class="rounded-full" href="{{ asset('img/home/marca1.webp') }}" type="image/x-icon">
    <meta name="description" content="Una plataforma fitnes donde puedes encontrar el curso ideal para tu cuerpo para verte saludable y bien">
    <style>
        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-track {
            border: 5px;
            box-shadow: inset 0 0 15px #b8b8b8;
        }

        ::-webkit-scrollbar-thumb {
            /* background: linear-gradient(#eecda3,#ef629f); */
            background: #000000;
            border: 2px solid #d18708;
            border-radius: 25px;
        }

    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    @livewireStyles
    @stack('css')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}" defer></script>
    <script src="{{ asset('https://unpkg.com/swiper@7/swiper-bundle.min.js') }}" defer></script>
    <!-- SEO -->
    <meta name="DC.Language" scheme="RFC1766" content="Spanish">
    <meta http-equiv="content-language" content="es">
    <meta name="author" content="Stalin Pilco">
    <meta name="copyright" content="fitking">
    <meta name="reply-to" content="fitking@hotmail.com">
    <link REV="made" href="mailto:fitking@hotmail.com">
    <meta name="description" content="Pagina donde puedes conseguir el plan ideal para llevar tu cuerpo al siguiente nivel estando bien por fuera y por dentro.">
    <meta name="keywords" content="planes,plataforma de  planes,fitness,entrenamientos personalizados,productos fitness,venta de accesorios fitness,venta de suplementos,gym">
    <meta name="Resource-type" content="Document">
    <meta name="DateCreated" content="Tue, 25 January 2022 00:00:00 GMT+1">
    <meta name="Revisit-after" content="1 days">
    <meta http-equiv="cache-control" content="cache">
    <meta name="robots" content="all">

    <!-- Open Graph data -->
    <meta property="og:title" content="fitking" />
    <meta property="og:type" content="sport" />
    <meta property="og:url" content="{{ config('app.url', 'FitKing') }}" />
    {{-- FOTO DONDE SALE LA BIOGRAFIA --}}
    <meta property="og:image" content="{{ asset('img/home/marca1.webp') }}" />
    <meta property="og:description" content="Pagina donde puedes conseguir el plan ideal para llevar tu cuerpo al siguiente nivel estando bien por fuera y por dentro." />
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
    <footer class="relative bg-black pt-10 pb-1 border-t-2 border-yellow-500">

        <div class="container justify-center">
            <div class="flex flex-wrap justify-between">
                <div class="w-full lg:w-3/12 px-6 text-center">
                    <div
                        class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-at text-xl"></i>
                    </div>
                    <h5 class="text-xs md:text-sm mt-2 font-semibold text-gray-400">
                        Correo Electronico
                    </h5>
                    <p class="mt-2 mb-4 text-xs text-gray-400">
                        kitking@hotmail.com
                    </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-phone text-xl"></i>
                    </div>
                    <h5 class="text-xs md:text-sm mt-2 font-semibold text-gray-400">
                        Telefono
                    </h5>
                    <p class="mt-2 text-xs mb-4 text-gray-400">
                        0999999999
                    </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-route text-xl"></i>
                    </div>
                    <h5 class="text-xs md:text-sm mt-2 font-semibold text-gray-400">Direccion domiciliaria</h5>
                    <p class="mt-2 text-xs mb-4 text-gray-400">
                        Av. Los Puentas
                    </p>
                </div>
            </div>
            <div class="flex justify-center items-center text-center mt-2">
                <div class="w-full lg:w-6/12 px-4 ">
                    <h4 class="text-xs md:text-sm font-semibold text-gray-400">Sigueme en mis redes sociales!</h4>

                    <div class="mt-3 justify-between items-center text-center">
                        <a href=""
                            class="text-gray-900 mr-2 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                            <i class="fab fa-facebook text-lg text-blue-600"></i>
                        </a>
                        <a href=""
                            class="text-gray-900 mr-2 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                            <i class="fab fa-instagram text-lg text-red-500"></i>
                        </a>
                        <a href=""
                            class="text-gray-900 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                            <i class="fab fa-whatsapp text-lg text-green-500 "></i>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="border-gray-400 mb-2 mt-4" />

            <div class="flex items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 lg:w-auto mx-auto text-center">
                    <div class="text-xs text-gray-400 font-semibold py-1">
                        Copyright © 2021 Todos los derechos reservados por FitKing

                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center md:justify-between justify-center mt-2">
                <div class="w-full md:w-4/12  mx-auto text-center">
                    <div class="text-xs text-gray-400 font-semibold py-1">
                        Desarrollado por:
                        <a href="https://www.facebook.com/smith.aviles3/" class="text-gray-400 hover:text-gray-100">Ing.
                            Smith Aviles</a>.
                        <a href="https://www.facebook.com/smith.aviles3/"
                            class="p-3 w-1 h-1 overflow-hidden  shadow-lg  rounded-full inline-flex items-center justify-center">
                            <i class="fab fa-facebook text-lg text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    @stack('modals')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
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
