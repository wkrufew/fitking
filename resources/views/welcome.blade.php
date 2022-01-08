<x-app-layout>
    <style>
        .slider-hidden {
            overflow: hidden;
        }

        .swiper {
            width: 100%;
            height: 100%;
            background: #fff;
        }

        .altura {
            height: 100vh;
        }

        @media screen and (max-width: 600px) {
            .swiper {
                width: 100%;
                height: 100%;
                background: #fff;
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
            z-index: 10;
        }

        .baner{
          top: 0; 
          left: 0; 
          width: 100%; 
          height: 100%; 
          display: flex; 
          justify-content: center; 
          align-items: center;
        }

        @media screen and (max-width: 600px) {
          .baner{
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

    <section class="mt-0 md:mt-0 mb-0 md:mb-0 altura portada filo relative filo">
       
        <div class="swiper">
            <div class="swiper-wrapper relative">
                <div class="swiper-slide posicion1">
                    <img class="w-full object-cover" src="{{ asset('img/home/2.png') }}" alt="">
                </div>
                <div class="swiper-slide posicion1">
                    <img class="w-full object-cover" src="{{ asset('img/home/gym.jpg') }}" alt="">
                </div>
                <div class="swiper-slide posicion1">
                    <img class="w-full object-cover" src="{{ asset('img/home/sentadilla.jpg') }}" alt="">
                </div>
            </div>
            
            <!-- Add Pagination -->
            <div class="hidden md:block swiper-pagination swiper-pagination-white"></div>
            <!-- Add Navigation -->
           {{--  <div class="hidden md:block swiper-button-prev swiper-button-white"></div>
            <div class="hidden md:block swiper-button-next swiper-button-white"></div> --}}
        </div>
    </section>



    <section style="" class="absolute z-10 hidden md:block text-center baner px-14 md:px-0 ">
        <div class="max-w-2xl md:max-w-3xl mx-auto px-2 md:px-4 sm:px-6 lg:px-16 py-5 md:py-10 bg-black bg-opacity-50 rounded-xl">
            <div class="w-full md:w-1/2 lg:w-full select-none justify-center ">
                <h1 class="text-yellow-500 font-extrabold text-base md:text-4xl mb-1 md:mb-6">BIENVENIDO A FITKING</h1>
                <p class="text-white font-bolt text-xs md:text-2xl mb-0 md:mb-4">Platatorma donde puedes conseguir el plan ideal para
                    llevar tu cuerpo al siguiente nivel.</p>
                <!--Aqui va el buscador-->
                <div class="hidden md:block">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
   

    <script type="module">
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
    </script>
    <!--SLIDER-->
    <section class="w-full relative -mt-32 z-10 hidden md:block">
        <a href="#fitking" class="flex justify-center">
          <svg class="animate-bounce w-10 h-10 text-yellow-600 font-extrabold bg-white bg-opacity-70 rounded-full p-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
          </svg>
        </a>
    </section>
    <div id="fitking"></div>
    <section class="bg-black pt-0 md:pt-24">
        <div class="py-3" >
            <h1 class="text-white text-center font-bold text-5xl py-4 md:mb-6">FitKing
            </h1>
        </div>
        <div
            class="object-center max-w-7xl mx-auto px-8 sm:px-8 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-2 md:gap-y-8 ">
            <article>
                <figure>
                    <img class="rounded-xl h-144 w-full object-cover" src="{{ asset('img/home/sentadilla.jpg') }}"
                        alt="img-propietario">
                </figure>
            </article>
            <article class="my-auto">
                <header class="mt-2">
                    <h1 class="text-center mt-1 md:mt-2 mb-1 text-3xl text-gray-50">Stalin Pilco
                    </h1>
                </header>
                <p
                    class="text-center text-base px-1 md:px-10 md:text-2xl mt-2 md:mt-4 text-gray-300">Joven deportista , con 22
                    años estoy creando una comunidad de asesorados
                    con aspiraciones a una vida Fitness y competencias , me eh inspirado mucho
                    en los grandes deportistas como ; Arnold Schwarzenegger , Jeremy Buendía ,
                    Andre deiu , Silvestre Stallone , Jeff Seid , zyzz .</p>
            </article>
        </div>

    </section>

    <section class="bg-black">
        <div class="py-6">
            <h1 class="text-white underline text-center font-bolt text-3xl mb-4 md:mb-8">
                Contenido</h1>
        </div>

        <div
            class="max-w-7xl mx-auto px-8  sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                <figure class="">
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen1.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1
                        class="text-center font-bold mt-2 mb-1 text-lg text-gray-200 px-10">PLAN NUTRICIONAL
                    </h1>
                </header>
                <p class="text-center text-gray-300 px-2">Una alimentacion
                    inteligente ayuda a tu progreso dando lo necesario a tus musculos</p>
            </article>
            <article
                class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen2.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1
                        class="text-center mt-2 font-bold mb-1 text-lg text-gray-200 px-10">ENTRENAMIENTO</h1>
                </header>
                <p class="text-center text-gray-300 px-2">Estimulacion
                    inteligente a tus musculos para que sean mas grandes</p>
            </article>
            <article
                class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen3.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1
                        class="text-center mt-2 mb-1 font-bold text-lg text-gray-200 px-0">SEGUIMIENTO
                        PERSONALIZADO</h1>
                </header>
                <p class="text-center text-gray-300 px-2">Pendientes a tu
                    progreso para guiarte en cada paso que des</p>
            </article>
            <article
                class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 rounded-lg object-cover">
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen4.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1
                        class="text-center mt-2 font-bold mb-1 text-xl text-gray-200 px-2">VIDEOS INSTRUCTIVOS
                    </h1>
                </header>
                <p class=" text-gray-300 px-2 text-center">El complemento perfecto
                    es la ayuda visual para que realices bien tus ejercicios</p>
            </article>
        </div>

    </section>


    <section class="bg-black py-28 md:py-36 px-6">
        <h1
            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 text-white text-center text-2xl md:text-4xl">
            No sabes que plan adquirir?</h1>
        <p
            class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 text-white text-center mt-2 text-lg md:text-2xl">
            Ve al catalogo de planes y elije el mejor y empieza ahora.</p>
        <div class="flex justify-center mt-6 border-transparent border-0 border-none">
            <a href="{{ route('cursos.index') }}"
                class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 center py-4 px-5 bg-red-500 text-white font-semibold rounded-full shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                ENTRENA CONMIGO
            </a>
        </div>

    </section>

    {{-- <section class="mt-9">
        <h1 class="text-center text-3xl text-gray-600 mb-10">ULTIMOS PLANES</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10">
            @foreach ($courses as $plan)
                <x-course-card :plan="$plan"/>
            @endforeach

        </div>
    </section> --}}
    {{-- INICIO DE LA ULTIMA FRANJA DE LA PANTALLA DE INICIO --}}

    <section class="pb-10 relative  bg-white">

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
    <section class="pb-16 bg-white">
        <div>
            <h2 class="text-center text-3xl font-semibold mb-8 md:mb-6">Marcas</h2>
        </div>

        <div
            class="max-w-7xl mx-auto px-8  sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure class="flex justify-center">
                    <img class="rounded-xl h-36 w-36 object-cover transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" src="{{ asset('img/home/marca1.webp') }}" alt="">
                </figure>
                <header>
                    <h1
                        class="my-2 text-center font-bold text-lg text-gray-700 px-10">Proton Whey
                    </h1>
                </header>
                <p class="text-center text-gray-600 px-2">Es un suplemento inteligente para tu musculo</p>
            </article>
            <article
                class="rounded-lg object-cover">
                <figure class="flex justify-center">
                    <img class="h-36 w-36 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" src="{{ asset('img/home/marca2.png') }}" alt="">
                </figure>
                <header>
                    <h1
                        class="text-center my-2 font-bold text-lg text-gray-700 px-10">ENTRENAMIENTO</h1>
                </header>
                <p class="text-center text-gray-600 px-2">Estimulacion
                    inteligente a tus musculos para que sean mas grandes</p>
            </article>
            <article
                class=" text-center">
                <figure class="flex justify-center">
                    <img class="h-36 w-40 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" src="{{ asset('img/home/marca3.jpg') }}" alt="">
                </figure>
                <header>
                    <h1
                        class="text-center my-2 font-bold text-lg text-gray-700 px-0">SEGUIMIENTO
                        PERSONALIZADO</h1>
                </header>
                <p class="text-center text-gray-600 px-2">Pendientes a tu
                    progreso para guiarte en cada paso que des</p>
            </article>
        </div>

    </section>
</x-app-layout>
