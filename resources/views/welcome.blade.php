<x-app-layout>
    {{-- INICIO SEO --}}
        @section('title', 'Inicio')
        @section('description', 'FITKING, es una empresa dedicada a al entrenamiento presonalizado y venta de prodcutos fitness como proteinas, creatinas, pre-entrenos entre otros.')
        @section('url', route('home'))
        @section('img', asset('img/home/logo2.webp'))
    {{-- FIN SEO --}}
   {{--  {{route('contact')}} --}}
    {{-- COMPONENTE LIVEWIRE DEL SLIDER --}}
    @livewire('portada-slider')
    
    <!--SLIDER-->
    {{-- CONTENIDO CENTRADO DE LA PORTADA DONDE ESTA LE BUSCADOR --}}
    <section class="absolute z-30 text-center inset-0 h-40 top-24 sm:top-32 md:top-52 lg:top-52 xl:top-52 px-10 md:px-0 ">
        <div
            class="sm:max-w-2xl md:max-w-2xl lg:max-w-3xl mx-auto px-2 md:px-4 sm:px-6 lg:px-16 py-5 md:py-10 bg-black bg-opacity-60 rounded-xl">
            <div class="w-full select-none justify-center ">
                <h1 class="text-yellow-500 font-extrabold text-2xl md:text-4xl mb-1 md:mb-6">BIENVENIDO A FITKING</h1>
                <p class="text-white font-bolt text-sm sm:text-xl lg:text-2xl mb-0 md:mb-4">
                    Platatorma donde puedes conseguir el plan ideal para llevar tu cuerpo al siguiente nivel.</p>
                <!--Aqui va el buscador-->
                <div class="hidden sm:block">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
    {{-- FLECHA INDICADORA HACIA ABAJO --}}
    <section class="w-full relative -mt-24 z-30 hidden sm:block">
        <a href="#fitking" class="flex justify-center">
            <svg class="animate-bounce w-10 h-10 text-yellow-600 hover:text-white hover:bg-yellow-500 duration-300 ease font-extrabold bg-white bg-opacity-70 rounded-full "
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </section>
    <div id="fitking"></div>
    {{-- SECCION DEL DUEÑO BIOGRAFIA --}}
    <section class="bg-black py-8 md:py-10 select-none">
        {{-- <div class="py-3">
            <h1 class="text-yellow-500 text-center font-bold text-5xl py-4 md:mb-6">FitKing
            </h1>
        </div> --}}
        <div>
            <div class="flex-shrink-0 flex justify-center">
                <img class="block h-60 object-center" src="{{ asset('img/home/logo3.jpg') }}">
            </div> 
        </div>
        <div class="object-center max-w-7xl mx-auto px-8 sm:px-8 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-6 gap-y-2 md:gap-y-8 ">
            {{-- <article class="my-auto">
                <figure class="border-2 border-yellow-500 overflow-hidden h-auto w-full object-cover">
                    <img src="{{ asset('img/home/sports.jpg') }}"
                        alt="img-propietario">
                </figure>
            </article> --}}
            <div >
                <figure class="border-4 border-yellow-500 overflow-hidden h-full relative">
                    {{-- <img class="w-auto h-auto object-cover" src="{{ asset('img/home/stalin.jpg') }}" alt="img-propietario"> --}}
                        <img class="w-auto h-auto object-cover" src="{{ asset('img/home/stalin.jpg') }}" alt="img-propietario">
                    <div class="opacity-0 hover:opacity-100 transition duration-300 ease">
                        <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                        <div class=" absolute inset-x-0 bottom-0 h-6 text-center z-10 text-yellow-500 text-xs">FitKing</div>
                    </div>
                </figure>
            </div>
            <article class="my-auto">
                <header class="py-2">
                    <h2 class="text-center font-semibold text-3xl text-yellow-500">STALIN PHILCO
                    </h2>
                </header>
                <p class="text-center text-base px-1 md:px-10 md:text-2xl py-2 text-gray-50">
                    Soy un joven deportista, estoy creando una gran comunidad con aspiraciones a una vida Fitness y competencias, 
                    me he inspirado mucho en los grandes deportistas para brindarles una experiencia total.
                </p>
                    <p class="text-center text-base px-1 md:px-10 md:text-2xl py-2 text-gray-50">
                        Esta plataforma web fue creada para aquellas personas que quieran cambiar su estilo de vida y mejorar su físico,
                        con mi conocimiento y experiencia para ayudar a facilitar su proceso.
                    </p>
                    <p class="text-center text-base px-1 md:px-10 md:text-2xl py-2 text-gray-50">Atleta NPC y entrenador Musclemania</p>
            </article>
        </div>
    </section>

    {{-- SECCION DE LO QUE OFRECE EL SISTEMA --}}
    <section class="bg-black py-10 select-none relative -mt-0.5 md:-mt-0">
        <div>
            <div class="bg-yellow-500 h-1 w-11/12 md:w-2/6 mx-auto mb-2"></div>
            <p class="text-center text-2xl md:text-4xl font-semibold text-yellow-500">CONTENIDO DE LOS PLANES</p>
            <div class="bg-yellow-500 h-1 w-11/12 md:w-2/6 mx-auto my-2"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-8 py-10 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <article class="h-80 border-2 hover:border-4 border-yellow-500 transition duration-300 ease transform hover:translate-y-0 hover:scale-105">
                <figure class="relative">
                    <img class="h-36 w-full object-cover" src="{{ asset('https://cdn.pixabay.com/photo/2015/03/28/10/21/diet-695723_1280.jpg') }}" alt="PLAN NUTRICIONAL">
                   {{--  <div class="absolute flex justify-center left-0 top-0 h-10 w-10 bg-red-500 rounded-full text-xs text-center">
                        <span class="my-auto text-white">Nuevo</span>
                    </div>
                    <div class="absolute inset-0 z-10 bg-gradient-to-t from-black to-transparent"></div>
                    <div class=" absolute inset-x-0 bottom-0 h-6 text-center z-10 text-white">HOLA PAPI</div> --}}
                </figure>
                <header class="pt-4">
                    <h2 class="text-center font-bold text-lg text-gray-100">PLAN NUTRICIONAL
                    </h2>
                </header>
                <p class="text-center text-gray-100 p-4 text-sm">
                    Vamos a brindar los mejores menus con varias opciones para que faciliten tu alimentación
                </p>
            </article>
            <article class="h-80 border-2 hover:border-4 border-yellow-500 transition duration-300 ease transform hover:translate-y-0 hover:scale-105">
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('https://images.pexels.com/photos/116077/pexels-photo-116077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }}" alt="ENTRENAMIENTO">
                </figure>
                <header class="pt-4">
                    <h2 class="text-center font-bold text-lg text-gray-100">ENTRENAMIENTO
                    </h2>
                </header>
                <p class="text-center text-gray-100 p-4 text-sm">
                    Entrenamiento dirigido por mi con tecnicas y guias para garantizar tus resultados
                </p>
            </article>
            <article class="h-80 border-2 hover:border-4 border-yellow-500 transition duration-300 ease transform hover:translate-y-0 hover:scale-105">
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('https://cdn.pixabay.com/photo/2016/08/31/23/16/motivation-1634875_1280.jpg') }}" alt="VIDEOS INSTRUCTIVOS">
                </figure>
                <header class="pt-4">
                    <h2 class="text-center font-bold text-lg text-gray-100">VIDEOS INSTRUCTIVOS
                    </h2>
                </header>
                <p class="text-center text-gray-100 p-4 text-sm">
                    Videos personalizados acorde a cada dia de entrenamiento
                </p>
            </article>  
            <article class="h-80 border-2 hover:border-4 border-yellow-500 transition duration-300 ease transform hover:translate-y-0 hover:scale-105">
                <figure>
                    <img class="h-36 w-full object-cover" src="{{ asset('https://cdn.pixabay.com/photo/2017/04/25/20/18/woman-2260736_1280.jpg') }}" alt="SEGUIMIENTO">
                </figure>
                <header class="pt-4">
                    <h2 class="text-center font-bold text-lg text-gray-100">SEGUIMIENTO PERSONALIZADO
                    </h2>
                </header>
                <p class="text-center text-gray-100 p-4 text-sm">
                    Entrenamiento inteligente conmigo, siendo tu soporte 24/7 para lograr cumplir tu objetivo
                </p>
            </article>
             
        </div>
    </section>
    {{-- FRANJA DONDE ESTA EL BOTON ADQUIRIR UN PLAN --}}
    <section class="relative bg-black text-gray-50 text-center -mt-0.5 md:-mt-0 pt-28 pb-44 px-6 select-none">
        
        <h2 class="text-2xl md:text-4xl text-center font-semibold py-2">
           NO SABES QUE PLAN ADQUIRIR?
        </h2>
        <p class="text-lg md:text-2xl font-semibold">
            VE AL CATALOGO DE PLANES, ELIJE EL MEJOR Y EMPIEZA AHORA.
        </p>
        <div class="flex justify-center mt-8">
            <a href="{{ route('cursos.index') }}"
                class="transition duration-300 ease transform hover:-translate-y-1 hover:scale-110 center py-3 px-5 bg-black text-yellow-500 font-semibold border border-yellow-500 shadow-md hover:bg-yellow-500 hover:text-black focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-75">
                ENTRENA CONMIGO
            </a>
        </div>
        <div class="left-0 bottom-0 min-w-full absolute">
            <svg xmlns="http://www.w3.org/2000/svg" 
                version="1.1" viewBox="0 0 2565 100">
                <polygon class="text-white fill-current" points="1280 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
     {{-- MUESTRA DE LOS SERVICIOS QUE OFRECE FITKINS --}}
    <section class="bg-white select-none py-10 relative mb-14 md:mb-24">
        
        <div class="container mx-auto px-4 lg:pt-2 lg:pb-9">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex-shrink-0 flex justify-center mb-2">
                            <img class="block h-60 object-center" src="{{ asset('img/home/logo2.webp') }}">
                    </div> 
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
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-dumbbell text-xl"></i>
                    </div>
                    <h5 class="text-xl mt-5 font-semibold text-gray-600">
                        Implementos
                    </h5>
                </div>
                <div class="w-full lg:w-3/12 px-4 text-center">
                    <div
                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                        <i class="fas fa-tshirt text-xl"></i>
                    </div>
                    <h5 class="text-xl mt-5 font-semibold text-gray-600">Vestimenta</h5>
                </div>
            </div>
        </div>
    </section> 
    {{-- MARCAS CON LAS QUE TRABAJA FITKING --}}  
    <section class="pb-16 bg-white select-none">
        <div>
            <h2 class="text-center text-3xl font-semibold mb-8 md:mb-6">MARCAS CON LAS QUE TRABAJAMOS</h2>
        </div>

        <div class="max-w-7xl mx-auto px-8 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-8">
            <article>
                <figure class="flex justify-center">
                    <img class="h-36 w-36 object-cover transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca1.webp') }}" alt="PROTON">
                </figure>
                <header>
                    <h3 class="my-2 text-center font-bold text-lg text-gray-700">CREATINA
                    </h3>
                </header>
                <p class="text-center text-gray-600 px-2">Brinda masa muscular y fuerza</p>
            </article>
            <article class=" text-center">
                <figure class="flex justify-center">
                    <img class="h-36 w-40 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca3.jpg') }}" alt="SEGUIMIENTO">
                </figure>
                <header>
                    <h3 class="text-center my-2 font-bold text-lg text-gray-700 px-0">
                        PROTEINAS
                    </h3>
                </header>
                <p class="text-center text-gray-600 px-2">
                    Ayuda a la rapida recuperación del musculo
                </p>
            </article>
            <article class="rounded-lg object-cover">
                <figure class="flex justify-center">
                    <img class="h-36 w-36 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110"
                        src="{{ asset('img/home/marca2.png') }}" alt="ENTRENAMIENTO">
                </figure>
                <header>
                    <h3 class="text-center my-2 font-bold text-lg text-gray-700 px-10">
                        BCAA
                    </h3>
                </header>
                <p class="text-center text-gray-600 px-2">
                    Evita el catabolismo muscular
                </p>
            </article>
        </div>

    </section>
    {{-- <x-footer/> --}}
</x-app-layout>
