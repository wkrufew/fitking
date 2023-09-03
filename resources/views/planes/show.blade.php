<x-app-layout>

    {{-- INICIO SEO --}}
    @section('title', '- ' . $plan->title)
    @section('description', $plan->subtitle)
    @section('url', route('planes.status', $plan))
    @section('img', Storage::url($plan->image->url))
    {{-- FIN SEO --}}

    {{-- SECCION PARA COMPRAR EL CURSO EN DISPOSITIVOS MOVILES --}}
    <style>
        .fondo {
            background-color: #000000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(329,768,357)'%3E%3Cstop offset='0' stop-color='%23000000'/%3E%3Cstop offset='1' stop-color='%23896B0C'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='508' height='423.3' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <section class="overflow-hidden block md:hidden">
        <div
            class="fixed z-50 right-0 bottom-1 w-full -mb-2 shadow-xl bg-black border-t-2 border-yellow-500 rounded-t-md">
            <div class="px-4 pb-7">
                @auth
                    @can('enrolled', $plan)
                        <a class="px-4 py-2 border-2 mt-6 border-yellow-500 text-yellow-500 btn-block rounded-md"
                            href="{{ route('planes.status', $plan) }}">Continue con su plan</a>
                    @else
                        @if ($plan->price->value == 0)
                            <div class="flex justify-evenly py-3">
                                <h1 class="font-semibold text-white text-base mt-2">Instructor: {{ $plan->teacher->name }}</h1>
                                <p class="text-yellow-500 text-base mt-2 font-semibold">Gratis</p>
                            </div>
                            <form action="{{ route('planes.enrolled', $plan) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 border-2 border-yellow-500 text-yellow-500 btn-block rounded-md">Adquiere
                                    este plan</button>
                            </form>
                        @else
                            <div class="flex justify-evenly py-3">
                                <h1 class="font-bold text-white text-base mt-2">Instructor: {{ $plan->teacher->name }}</h1>
                                <p class="text-yellow-500 text-base mt-2 font-bold  text-center">Precio:&nbsp;$
                                    {{ $plan->price->value }}</p>
                            </div>
                            <a href="{{ route('payment.checkout', $plan) }}"
                                class="px-4 py-2 border-2 border-yellow-500 text-yellow-500 btn-block rounded-md">Comprar este
                                curso</a>
                        @endif
                    @endcan
                @else
                    <div class="flex justify-evenly py-3">
                        <h1 class="font-bold text-white text-base mt-2">Instructor: {{ $plan->teacher->name }}</h1>
                        <p class="text-yellow-500 text-base mt-2 font-bold  text-center">Precio:&nbsp;$
                            {{ $plan->price->value }}</p>
                    </div>
                    <div class="text-neutral-50 text-sm mb-2">
                        <b>Nota:</b> Para adquirir este plan debe estar registrado y haber iniciado sesion
                    </div>
                    <a href="{{ route('login') }}" class="px-4 py-2 border-2 border-yellow-500 text-yellow-500 btn-block">
                        Iniciar Sesión
                    </a>
                @endauth
            </div>
        </div>
    </section>
    {{-- SECCION PORTADA --}}
    <section
        class="fondo pb-4 md:pb-8 mb-8 md:mb-6 pt-20 md:pt-32 relative rounded-b-md border-b-2 border-yellow-500 select-none">
        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-16">

            <div class="text-white px-2 md:px-0 my-auto col-span-2">
                <h1 class="text-lg md:text-3xl text-yellow-500 uppercase font-semibold">{{ $plan->title }}</h1>
                <p class="text-sm md:text-lg mb-3 mt-2">{{ $plan->subtitle }}</p>
                <p class="mb-2 text-sm md:text-base"><i class="fas fa-clone"></i> Categoria:
                    {{ $plan->category->name }}</p>
                <p class="mb-2 text-sm md:text-base"><i class="fas fa-chart-line"></i> {{ $plan->level->name }}
                </p>
                <p class="mb-2 text-sm md:text-base"><i class="fas fa-users"></i>
                    {{ $plan->students_count ? $plan->students_count : 'Sin estudiantes' }}
                </p>
                <p class="text-xs md:text-base"><i class="fas fa-star"></i>
                    {{ $plan->reviews_avg_rating ? round($plan->reviews_avg_rating, 1) : 'Sin calificaciones' }} </p>
            </div>

            <figure class="overflow-hidden rounded-md block md:hidden">
                <img class="h-auto md:h-72 w-full object-cover bg-cover transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                    src="{{ Storage::url($plan->image->url) }}" alt="{{ $plan->title }}">
            </figure>
        </div>
    </section>
    {{-- SECCION DE ALERTAS --}}
    @if (session('notificacion'))
        <div x-data="{ open: true }" class="my-6">
            <div x-show="open"
                class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative max-w-7xl mx-auto"
                role="alert">
                <strong class="font-bold">Ok!</strong>
                <span class="block sm:inline">{{ session('notificacion') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('notificacion2'))
        <div x-data="{ open: true }" class="my-6">
            <div x-show="open"
                class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative max-w-7xl mx-auto"
                role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ session('notificacion2') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('errorpaypal'))
        <div x-data="{ open: true }" class="my-6">
            <div x-show="open"
                class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative max-w-7xl mx-auto"
                role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ session('errorpaypal') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('notificacionreserva'))
        <div x-data="{ open: true }" class="my-6">
            <div x-show="open"
                class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative max-w-7xl mx-auto"
                role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">{{ session('notificacionreserva') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 bg-white">
        {{-- SECCION PRINCIPAL IZQUIERDA --}}
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- LO QUE APRENDERAS --}}
            <section class="card mb-6 select-none">
                <div class="card-body">
                    <h2 class="font-bold text-base md:text-lg mb-2 text-gray-700">Metas a ser Alcanzadas</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1 list-outside">
                        @foreach ($plan->goals as $goal)
                            <li class="text-gray-700 text-sm md:text-base">
                                <i class="text-xs fa-solid fa-circle-check text-yellow-500 mr-1"></i>
                                {{ $goal->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            {{-- TEMARIO --}}
            <section class="mb-6 select-none card">
                <h2 class="font-bold text-base md:text-lg mb-2 text-gray-700 mx-4 pt-2">Cronograma de Entrenamiento
                </h2>
                @foreach ($plan->sections as $section)
                    <article x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }">
                        <header class="cursor-pointer bg-gray-200  border-b-2 border-gray-200">
                            <div x-on:click.prevent="open = !open"
                                class="flex justify-between z-50 cursor-pointer px-4 py-3">
                                <h1 class="font-semibold text-sm md:text-sm text-gray-800">{{ $section->name }}</h1>
                                <i x-on:click.stop class="fas transition ease-in-out duration-500 mr-2"
                                    :class="{ 'transform rotate-0 text-gray-500 fa-plus': !
                                        open, 'transform rotate-180 text-gray-500 fa-minus': open }"></i>
                            </div>
                        </header>
                        <div class="bg-white py-2 px-4" x-show="open" {{-- x-transition:enter="transition-all duration-1000"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition-all duration-300"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="bg-opacity-0 scale-90"> --}}
                            x-show.transition.opacity="open"
                            x-transition:enter="transition-all transform duration-500"
                            x-transition:enter-start="opacity-0 translate-y-[-10%]"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition-all transform duration-500"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-[-10%]">
                            <ul class="grid grid-cols-1 gap-2">
                                {{-- @if ($section->lesson->resource)
                                    {{$section->lesson->resource->count()}}
                                @endif --}}
                                
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-600 font-semibold text-xs md:text-sm">
                                        <i class="fas fa-play-circle ml-6 mr-1 text-yellow-500"></i>
                                        {{ $lesson->name }}
                                        
                                        @if ($lesson->resource)
                                            {{-- {{$lesson->resource->sum()}} --}}
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>
            {{-- REQUISITOS PARA EMPEZAR EL CURSO --}}
            <section class="card p-5 mb-6 select-none bg-white">
                <h2 class="font-bold text-base md:text-lg mb-2 text-gray-700">Requisitos para empezar con el plan</h2>
                <ul class="list-none list-inside">
                    @foreach ($plan->requirements as $requirement)
                        <li class="text-gray-700 text-sm md:text-base">
                            <i
                                class="text-xs fa-solid fa-circle-check text-yellow-500 mr-2"></i>{{ $requirement->name }}
                        </li>
                    @endforeach
                </ul>
            </section>
            {{-- DESCRIPCION DEL PLAN --}}
            <section class="card p-5 select-none mb-6 bg-white">
                <h2 class="font-bold text-base md:text-lg mb-2 text-gray-700">Descripción del plan</h2>
                <div class="text-gray-700 text-sm md:text-base text-justify">
                    {!! $plan->description !!}
                </div>
            </section>
            {{-- AUDIENCIA --}}
            <section class="card p-5 select-none mb-6 bg-white">
                <h2 class="font-bold text-base md:text-lg  mb-2 text-gray-700">Para quien es este plan?</h2>
                <div class="text-gray-700 text-base">
                    <ul class="list-none list-outside list-image-none">
                        @foreach ($plan->audiences as $au)
                            <li class="text-gray-700 text-sm md:text-base">
                                <i
                                    class="fas text-xs fa-solid fa-circle-check text-yellow-500 mr-2"></i><span>{{ $au->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            {{-- RENDERIZA LA VISTA DE LOS COMENTARIOS --}}
            @livewire('courses-rivews', ['plan' => $plan])
        </div>
        {{-- SECCION SECUNDARIO DERECHA --}}
        <div class="order-1 lg:order-2 select-none hidden md:block">
            {{-- COMPRAR O INGRESAR AL CURSO --}}
            <section class="card mb-6 z-10 -mt-72 border-none md:sticky md:-top-32">
                <figure class="overflow-hidden">
                    <img class="h-48 w-full object-cover bg-cover transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105" src="{{ Storage::url($plan->image->url) }}" alt="{{ $plan->title }}">
                </figure>
                <div class="card-body">
                    @auth
                        @can('enrolled', $plan)
                            <a class="transition duration-500 ease-in-out transform hover:-translate-y-1 rounded-md hover:scale-105 block bg-black text-yellow-500 mt-4 py-2 text-center" href="{{ route('planes.status', $plan) }}">
                                Continua con el plan
                            </a>
                        @else
                            @if ($plan->price->value == 0)
                                <p class="text-green-700 mt-2 mb-1 font-bold my-1">Gratis</p>
                                <form action="{{ route('planes.enrolled', $plan) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="transition rounded-md duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 py-2 px-4 text-center btn-block mt-4 bg-green-700 text-white">
                                        Adquiere este plan
                                    </button>
                                </form>
                            @else
                                <p class="text-gray-800 mt-2 mb-1 font-bold my-1">
                                    Precio:&nbsp;${{ $plan->price->value }}</p>
                                <a href="{{ route('payment.checkout', $plan) }}" class="font-bold py-2 px-4 bg-black text-yellow-600 text-center rounded-md block mt-4 hover:bg-green-700 hover:text-white">
                                    Comprar este curso
                                </a>
                            @endif
                        @endcan
                    @else
                        @if ($plan->price->value == 0)
                            <p class="text-green-700 text-lg my-1 font-bold">Gratis</p>
                        @else
                            <p class="text-gray-800 text-lg my-1 font-extrabold">
                                Precio:&nbsp;$ {{ $plan->price->value }}</p>
                        @endif
                        <div class="text-neutral-700 text-xs">
                        </div>
                        <a href="{{ route('payment.verification', $plan) }}"
                            class="font-bold py-2 px-4 bg-black text-yellow-600 text-center rounded-md block mt-4 hover:bg-green-700 hover:text-white">
                            Comprar este curso
                        </a>
                    @endauth
                    <div class="mt-4 space-y-1 text-base">
                        <h3 class="mb-2"><strong>Este curso incluye:</strong></h3>
                        <p>
                            <i class="text-sm fa-solid fa-download text-yellow-500 mr-2"></i>Recursos descargables 
                        </p>
                        <p>
                            <i class="text-sm fa-solid fa-infinity text-yellow-500 mr-2"></i>Acesso de por vida
                        </p>
                        <p>
                            <i class="text-sm fa-solid fa-mobile-screen-button text-yellow-500 mr-2"></i>Acceso en dispositivos moviles
                        </p>
                        <p>
                            <i class="text-sm fa-solid fa-globe text-yellow-500 mr-2"></i>En español
                        </p>
                        <p>
                            <i class="text-sm fa-solid fa-user text-yellow-500 mr-2"></i>Creado por: {{$plan->teacher->name}}
                        </p>
                        @if ($plan->created_at < $plan->updated_at)
                            <p>
                                <i class="text-sm fa-solid fa-arrows-rotate text-yellow-500 mr-2"></i>Ultima actualizacion: {{$plan->updated_at}}
                            </p>
                        @else
                            <p>
                                <i class="text-sm fa-solid fa-arrows-rotate text-yellow-500 mr-2"></i>Creado el: {{$plan->created_at}}
                            </p> 
                        @endif
                    </div>
                </div>
            </section>
            <script>
                //este es el punto en pixeles que quieres que el objeto desaparezca completamente 
                window.addEventListener("scroll", () => {
                    //const puntoquiebre = 1410;
                    const currentScroll = window.pageYOffset; //Obtiener valor del scroll en el eje Y
                    if (currentScroll <= 1100) {
                        opacity = (1 - currentScroll / 1810) +
                            0.3; //calculo para reduccion del opciti del valor uno hasta llegar a cero 
                        //alert(opacity);
                    } else {
                        opacity =
                            0; //cuando el valor del scroll es menor o igual que el punto que yo eleji es por defecto 0 y asi se pierde el div 
                    }
                    document.querySelector(".interesar").style.opacity =
                        opacity; //asigno el valor del opcity al div que tiene la clase interesar
                });
            </script>
            {{-- SIMILARES --}}
            <aside class="hidden lg:block select-none md:sticky md:top-54 interesar">
                @if (count($similares))
                    <h1 class="font-bold text-lg md:text-lg mb-2 text-gray-700">Te puede interesar</h1>
                @endif
                @foreach ($similares as $similar)
                    <a class="cursor-pointer" href="{{ route('planes.show', $similar) }}">
                        <article
                            class="card rounded-lg object-cover overflow-hidden flex mb-6 transition duration-300 ease-in-out transform hover:scale-105">
                            <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}"
                                alt="{{ $similar->slug }}">
                            <div class="ml-3">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                        src="{{ $similar->teacher->profile_photo_url }}"
                                        alt="{{ $similar->teacher->name }}">
                                    <div class="ml-2">
                                        <p class="text-neutral-800 text-sm font-semibold">
                                            {{ $similar->teacher->name }}</p>
                                        <p class="text-xs text-blue-400">Instructor</p>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <h3 class="font-bold text-gray-800 hover:text-yellow-500 text-base"
                                        {{-- href="{{ route('planes.show', $similar) }}" --}}>{{ Str::limit($similar->title, 40) }}</h3>
                                    <p class="text-xs pr-2">{{ Str::limit($similar->subtitle, 60) }}</p>
                                    <p class="text-sm pt-1"> <i
                                            class="fas fa-star mr-2 text-yellow-500"></i>{{ $similar->reviews_avg_rating ? round($similar->reviews_avg_rating, 1) : 'Sin calificaciones' }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
            </aside>
        </div>
    </div>

</x-app-layout>
