<x-app-layout>
    <style>
        .slider-hidden {
            overflow: hidden;
        }

        .swiper {
            width: 100%;
            height: 100%;
            background: rgb(0, 0, 0);
        }

        .altura {
            height: 100vh;
        }

        @media screen and (max-width: 600px) {
            .swiper {
                width: 100%;
                height: 100%;
                background: rgb(0, 0, 0);
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
            }

            .altura {
                height: 100%;
            }
        }

        .filo::before {
            content: '';
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 9px;
            background: linear-gradient(to top, #000000, transparent);
            z-index: 4;
        }

        .baner {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media screen and (max-width: 600px) {
            .baner {
                top: 0;
                left: 0;
                width: 100%;
                height: 40%;
                display: flex;
                justify-content: center;
                align-items: center;

            }
        }

    </style>
    {{-- COMPONENTE LIVEWIRE DEL SLIDER --}}
    @livewire('portada-slider')
    @push('js')
        <script>
            Livewire.on('swiper', function() {
                var swiper = new Swiper('.swiper', {
                    effect: "fade",
                    loop: true,
                    autoplay: true,
                    speed: 1000,
                    parallax: true,
                    centeredSlides: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    /* navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                        nextEl: false,
                        prevEl: false,
                    }, */
                });
            });
        </script>
    @endpush
    <!--SLIDER-->
    {{-- CONTENIDO CENTRADO DE LA PORTADA DONDE ESTA LE BUSCADOR --}}
    <section style="" class="absolute z-10 hidden md:block text-center baner px-14 md:px-0 ">
        <div
            class="max-w-2xl md:max-w-3xl mx-auto px-2 md:px-4 sm:px-6 lg:px-16 py-5 md:py-10 bg-black bg-opacity-50 rounded-xl">
            <div class="w-full md:w-1/2 lg:w-full select-none justify-center ">
                <h1 class="text-yellow-500 font-extrabold text-base md:text-4xl mb-1 md:mb-6">BIENVENIDO A FITKING</h1>
                <p class="text-white font-bolt text-xs md:text-2xl mb-0 md:mb-4">Platatorma donde puedes conseguir el
                    plan ideal para
                    llevar tu cuerpo al siguiente nivel.</p>
                <!--Aqui va el buscador-->
                <div class="hidden md:block">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
    {{-- FLECHA INDICADORA HACIA ABAJO --}}
    <section class="w-full relative -mt-24 z-30 hidden md:block">
        <a href="#fitking" class="flex justify-center">
            <svg class="animate-bounce w-10 h-10 text-yellow-600 font-extrabold bg-white bg-opacity-70 rounded-full "
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </section>
    <div id="fitking"></div>
    {{-- SECCION DEL DUEÑO BIOGRAFIA --}}
    <section class="bg-black pt-0 md:py-24 select-none">
        <div class="py-3">
            <h1 class="text-yellow-500 text-center font-bold text-5xl py-4 md:mb-6">FitKing
            </h1>
        </div>
        <div
            class="object-center mb-16 max-w-7xl mx-auto px-8 sm:px-8 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-2 md:gap-y-8 ">
            <article>
                <figure class="border-2 border-yellow-500 rounded-xl overflow-hidden h-144 w-full object-cover">
                    <img src="{{ asset('img/home/sports.jpg') }}"
                        alt="img-propietario">
                </figure>
            </article>
            <article class="my-auto">
                <header class="mt-2">
                    <h1 class="text-center mt-1 md:mt-2 mb-1 font-semibold text-3xl text-yellow-500">STALIN PILCO
                    </h1>
                </header>
                <p class="text-center text-base px-1 md:px-10 md:text-2xl mt-2 md:mt-4 text-gray-50">Joven deportista ,
                    con 22
                    años estoy creando una comunidad de asesorados
                    con aspiraciones a una vida Fitness y competencias , me eh inspirado mucho
                    en los grandes deportistas como ; Arnold Schwarzenegger , Jeremy Buendía ,
                    Andre deiu , Silvestre Stallone , Jeff Seid , zyzz .</p>
            </article>
        </div>

    </section>
    {{-- MUESTRA DE LOS SERVICIOS QUE OFRECE FITKINS --}}
    <section class="bg-white select-none py-10 relative mb-24">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2565 100" x="0" y="0">
                <polygon class="text-white fill-current" points="1280 0 2560 100 0 100"></polygon>

            </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-2 lg:pb-9">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-gray-800 pt-4 md:pt-0">FITKING</h2>
                    <p class="text-xl  font-medium mt-4 mb-4 text-gray-700 uppercase">
                        Es una empresa dedicada al condicionamiento fisico que ofrece multiples
                        productos entre ellos los siguientes:
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap mt-12 justify-center">
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-atom text-xl"></i>
                    </div>
                    <h6 class="text-xl mt-5 font-semibold text-gray-600">
                        Suplementos
                    </h6>
                    <p class="mt-2 mb-4 text-gray-500">
                        Los mejores productos para darle a tu cuerpo lo que necesita antes y despues de entrenar
                    </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-dumbbell text-xl"></i>
                    </div>
                    <h5 class="text-xl mt-5 font-semibold text-gray-600">
                        Implementos
                    </h5>
                    <p class="mt-2 mb-4 text-gray-500">
                        Los mejores productos para darle a tu cuerpo lo que necesita antes y despues de entrenar
                    </p>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-tshirt text-xl"></i>
                    </div>
                    <h5 class="text-xl mt-5 font-semibold text-gray-600">Vestimenta</h5>
                    <p class="mt-2 mb-4 text-gray-500">
                        Los mejores productos para darle a tu cuerpo lo que necesita antes y despues de entrenar
                    </p>
                </div>
            </div>
        </div>
    </section> 
    {{-- FRANJA DONDE ESTA EL BOTON ADQUIRIR UN PLAN --}}
    <section class="relative bg-black text-gray-50 text-center py-28 md:py-32 px-6 select-none">
        <div class="bottom-0 top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2565 100" x="0" y="0">
                <polygon class="text-black fill-current" points="1280 0 2560 100 0 100"></polygon>

            </svg>
        </div>
        <h1 class="text-2xl md:text-4xl z-40">
            NO SABES QUE PLAN ADQUIRIR?</h1>
        <p class="mt-2 text-lg md:text-2xl z-40">
            VE AL CATALOGO DE PLANES, ELIJE EL MEJOR Y EMPIEZA AHORA.
        </p>
        <div class="flex justify-center mt-10 mb-24">
            <a href="{{ route('cursos.index') }}"
                class="transition duration-300 ease transform hover:-translate-y-1 hover:scale-110 center py-4 px-5 bg-yellow-500 text-white font-semibold rounded-full shadow-md hover:bg-white hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75">
                ENTRENA CONMIGO
            </a>
        </div>
    </section>
    {{-- SECCION DE LO QUE OFRECE EL SISTEMA --}}
    <section class="bg-white select-none py-2 relative mb-32 ">
        <div class="top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2565 100" x="0" y="0">
                <polygon class="text-white fill-current" points="1280 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="py-2">
            <h1 class="text-center text-4xl font-semibold text-gray-800 mb-4 md:mb-10 mt-16">CONTENIDO DE LOS PLANES</h1>
        </div>
        <div class="max-w-7xl mx-auto px-8  sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article class="transition duration-300 ease cursor-pointer shadow-xl transform hover:-translate-y-1 hover:scale-105 rounded-lg">
                <figure class="relative overflow-hidden">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/sports.jpg') }}" alt="">
                    {{-- <div class="absolute flex justify-center left-0 top-0 h-10 w-10 bg-red-500 rounded-full text-xs text-center">
                        <span class="my-auto text-white">Nuevo</span>
                    </div> --}}
                    {{-- <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                    <div class=" absolute inset-x-0 bottom-0 h-6 text-center z-10 text-white">HOLA PAPI</div> --}}
                </figure>
                <header class="mt-2">
                    <h1 class="text-center font-bold mt-3 text-base text-gray-700">PLAN NUTRICIONAL
                    </h1>
                </header>
                <p class="text-center text-gray-600 px-4 py-2 text-sm">Una alimentacion
                    inteligente ayuda a tu progreso dando lo necesario a tus musculos</p>
            </article>
            <article
                class="transition duration-300 ease cursor-pointer shadow-xl transform hover:-translate-y-1 hover:scale-105 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/sports.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center mt-2 font-bold text-base text-gray-700">ENTRENAMIENTO</h1>
                </header>
                <p class="text-center text-gray-600 px-4 py-2 text-sm">Estimulacion
                    inteligente a tus musculos para que sean mas grandes</p>
            </article>
            <article
                class="transition duration-300 ease cursor-pointer shadow-xl transform hover:-translate-y-1 hover:scale-105 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/sports.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center mt-2 font-bold text-base text-gray-700">SEGUIMIENTO
                        PERSONALIZADO</h1>
                </header>
                <p class="text-center text-gray-600 px-4 py-2 text-sm">Pendientes a tu
                    progreso para guiarte en cada paso que des</p>
            </article>
            <article
                class="transition duration-300 ease cursor-pointer shadow-xl transform hover:-translate-y-1 hover:scale-105 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/sports.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center mt-2 font-bold text-base text-gray-700">VIDEOS INSTRUCTIVOS
                    </h1>
                </header>
                <p class=" text-gray-600 px-4 py-2 text-center text-sm">El complemento perfecto
                    es la ayuda visual para que realices bien tus ejercicios</p>
            </article>
        </div>
    </section>
    {{-- MARCAS CON LAS QUE TRABAJA FITKING --}}  
    <section class="pb-16 bg-white select-none">
        <div>
            <h2 class="text-center text-3xl font-semibold mb-8 md:mb-6">MARCAS</h2>
        </div>

        <div class="max-w-7xl mx-auto px-8 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure class="flex justify-center">
                    <img class="rounded-xl h-36 w-36 object-cover transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca1.webp') }}" alt="">
                </figure>
                <header>
                    <h1 class="my-2 text-center font-bold text-lg text-gray-700">PROTON WHEY
                    </h1>
                </header>
                <p class="text-center text-gray-600 px-2">Es un suplemento inteligente para tu musculo</p>
            </article>
            <article class="rounded-lg object-cover">
                <figure class="flex justify-center">
                    <img class="h-36 w-36 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca2.png') }}" alt="">
                </figure>
                <header>
                    <h1 class="text-center my-2 font-bold text-lg text-gray-700 px-10">ENTRENAMIENTO</h1>
                </header>
                <p class="text-center text-gray-600 px-2">Estimulacion
                    inteligente a tus musculos para que sean mas grandes</p>
            </article>
            <article class=" text-center">
                <figure class="flex justify-center">
                    <img class="h-36 w-40 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca3.jpg') }}" alt="">
                </figure>
                <header>
                    <h1 class="text-center my-2 font-bold text-lg text-gray-700 px-0">SEGUIMIENTO
                        PERSONALIZADO</h1>
                </header>
                <p class="text-center text-gray-600 px-2">Pendientes a tu
                    progreso para guiarte en cada paso que des</p>
            </article>
        </div>

    </section>
    {{-- <x-footer/> --}}
</x-app-layout>
