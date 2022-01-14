<x-app-layout>
    <script>
        const puntoquiebre = 1410;//este es el punto en pixeles que quieres que el objeto desaparezca completamente 
    
        window.addEventListener("scroll", () => {
            const currentScroll = window.pageYOffset; //Obtiener valor del scroll en el eje Y
            if (currentScroll <= puntoquiebre) { 
                opacity = (1 - currentScroll / puntoquiebre)+0;   //calculo para reduccion del opciti del valor uno hasta llegar a cero 
            } else {
                opacity = 0; //cuando el valor del scroll es menor o igual que el punto que yo eleji es por defecto 0 y asi se pierde el div 
            }
            document.querySelector(".interesar").style.opacity = opacity; //asigno el valor del opcity al div que tiene la clase interesar
        });
    </script>
    <section class="bg-black pb-10 mb-8 md:mb-12 pt-16 md:pt-32 relative">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-16">
            <figure>
                <img class="h-auto md:h-72 w-full object-cover bg-cover rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                    src="{{ Storage::url($plan->image->url) }}" alt="">
            </figure>
            <div class="text-white px-2 md:px-0 my-auto">
                <h1 class="text-lg md:text-3xl">Titulo: {{ $plan->title }}</h1>
                <p class="text-sm md:text-xl mb-3 mt-2">Subtitulo: {{ $plan->subtitle }}</p>
                <p class="mb-2 text-xs md:text-xl"><i class="fas fa-chart-line"></i> Nivel: {{ $plan->level->name }}</p>
                <p class="mb-2 text-xs md:text-xl"><i class="fas fa-clone"></i> Categoria: {{ $plan->category->name }}</p>
                <p class="mb-2 text-xs md:text-xl"><i class="fas fa-users"></i> Estudiantes: 
                    @if ($plan->students_count > 34)
                        {{ $plan->students_count }}
                    @else
                        {{(random_int(35, 46))}}
                    @endif
                </p>
                <p class=" text-xs md:text-xl"><i class="fas fa-star"></i> Calificación: {{ $plan->rating }}</p>

            </div>
        </div>
    </section>
    @if (session('notificacion'))
        <div x-data="{ open: true }" class="my-6">
            <div x-show="open" class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative"
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
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative"
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
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative"
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
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 px-4 py-3 rounded relative"
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
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-6 md:mb-12 select-none">
                <div class="card-body">
                    <h1 class="font-bold text-lg md:text-2xl mb-2 text-gray-700">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1 list-none list-inside">
                        @foreach ($plan->goals as $goal)
                        <li class="text-gray-700 text-sm md:text-base">
                            <i class="fas text-xs fa-check text-gray-600 mr-1"></i> 
                                {{ $goal->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-6 md:mb-12 select-none card">
                <h1 class="font-bold text-lg md:text-2xl mb-2 text-gray-700 mx-4 pt-2">Temario</h1>

                @foreach ($plan->sections as $section)
                <article class="" @if ($loop->first)
                        x-data="{ open: true }"
                    @else
                        x-data="{ open: false }"
                    @endif>
                    <header class=" px-4 py-3 cursor-pointer bg-gray-100 flex justify-between border-b-2 border-gray-200" x-on:click=" open = !open ">
                        <h1 class="font-semibold text-sm md:text-sm  text-gray-800">{{ $section->name }}</h1><i class=" transform rotate-90 fas fa-play-circle mr-2 text-gray-600"></i>
                    </header>
                    {{-- <div class="border border-gray-200 px-8"></div> --}}
                    <div class="bg-white py-2 px-4" x-show="open">
                        <ul class="grid grid-cols-1 gap-2">
                            @foreach ($section->lessons as $lesson)
                                <li class="text-gray-600 font-semibold text-xs md:text-sm"><i class="fas fa-play-circle mr-2 text-gray-600"></i>
                                    {{ $lesson->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                
                @endforeach
            </section>

            <section class="card p-5 mb-6 md:mb-8 select-none sm:">
                <h1 class="font-bold text-lg md:text-2xl  mb-2 text-gray-700">Requisitos para empezar con el plan</h1>

                <ul class="list-none list-inside">
                    @foreach ($plan->requirements as $requirement)
                        <li class="text-gray-700 text-sm md:text-base">
                            <i class="fas text-xs fa-check text-gray-600 mr-2"></i>{{ $requirement->name }}
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="card p-5 select-none mb-10">
                <h1 class="font-bold text-lg md:text-2xl  mb-2 text-gray-700">Descripcion del plan</h1>

                <div class="text-gray-700 text-sm md:text-base text-justify">
                    {!! $plan->description !!}
                </div>
            </section>

            <section class="card p-5 select-none mb-10">
                <h1 class="font-bold text-lg md:text-2xl  mb-2 text-gray-700">Para quien es este plan?</h1>

                <div class="text-gray-700 text-base">
                    <ul class="list-none list-inside">
                        @foreach ($plan->audiences as $au)
                            <li class="text-gray-700 text-sm md:text-base">
                                <i class="fas text-xs fa-check text-gray-600 mr-2"></i>{{ $au->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            {{-- RENDERIZA LA VISTA DE LOS COMENTARIOS --}}
            @livewire('courses-rivews', ['plan' => $plan])

        </div>

        <div class="order-1 lg:order-2 select-none">
            <section class="card mb-6 md:sticky md:top-20 z-10">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $plan->teacher->profile_photo_url }}" alt="{{ $plan->teacher->name }}">
                        <div class="ml-4 h">
                            <h1 class="font-bold text-gray-800 text-sm">Instructor: {{ $plan->teacher->name }}</h1>
                            <a class="text-blue-400 text-sm" href="">{{ '@' . Str::slug($plan->teacher->name) }}</a>
                        </div>
                    </div>
                    @can('enrolled', $plan)
                        <a class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 btn btn-primary btn-block mt-4"
                            href="{{ route('planes.status', $plan) }}">Continua con el plan</a>
                    @else
                        @if ($plan->price->value == 0)
                            <p class="text-green-700 text-lg mt-4 mb-2 font-bold my-2">Gratis</p>
                            <form action="{{ route('planes.enrolled', $plan) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 btn btn-danger btn-block mt-4">Adquiere
                                    este plan</button>
                            </form>
                        @else
                            <p class="text-gray-800 text-lg mt-4 mb-2 font-bold my-2">
                                Precio:&nbsp;{{ $plan->price->value }}$</p>
                            <a href="{{ route('payment.checkout', $plan) }}" class="btn btn-danger btn-block mt-2">Comprar este curso</a>
                        @endif
                    @endcan
                </div>
            </section>

            <aside class="hidden lg:block select-none md:sticky md:top-64 interesar">
                @empty($similares)
                    <h1 class="font-bold text-2xl mb-2 text-gray-700">Te puede interesar</h1>
                @endempty
                @foreach ($similares as $similar)
                    <article
                        class="card rounded-lg object-cover overflow-hidden flex mb-6 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-800 mb-3"
                                    href="{{ route('planes.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                            </h1>
                            <div class="flex items-center mt-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                <p class="text-gray-800 text-sm ml-2">{{ $similar->teacher->name }}</p>
                            </div>
                            <p class="text-sms"><i
                                    class="fas fa-star mr-2 text-yellow-500"></i>{{ $similar->rating }}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>
