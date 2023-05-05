<div>
    <div class="relative h-20 w-full bg-black mb-10">
    </div>

    <div class="container">
        @if (session('exitopaypal'))
            <div x-data="{ open: true }" class="my-6">
                <div x-show="open" class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Ok!</strong>
                    <span class="block sm:inline">{{ session('exitopaypal') }}</span>
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
    </div>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-2 md:gap-8 select-none">
        <div class="lg:col-span-2 mb-0 md:mb-4">
            <div class="md:sticky md:top-16">
                <div class="card relative overflow-hidden">
                        <div class="relative">
                            <div class="embed-responsive relative w-full aspect-video px-36 md:px-16 lg:px-44 rounded-t-lg select-none">
                                {!! $current->iframe !!}
                            </div>
                            <div class="block lg:hidden">
                                <div style="z-index: 900" class="absolute top-0 left-0 w-full h-full px-36 md:px-16 lg:px-44 rounded-t-lg select-none portrait:hidden bg-black text-white">
                                    <h2 class="flex justify-center items-center h-full my-auto">Por favor girar el dispositivo para poder ver el video</h2>
                                </div>
                            </div>
                        </div>

                    <div class="bg-black relative">
                        <h2 class="text-sm mx-auto md:text-lg text-yellow-500 font-bold py-2 text-center">
                            {{ $current->name }}
                        </h2>
                    </div>
                    <div class="absolute top-0 left-0 w-full h-[80px] lg:h-[400px]" style="z-index: 900">
                    </div>
                    <div class="block md:hidden absolute top-0 right-0 w-28 h-[140px] lg:h-[400px]" style="z-index: 910">
                    </div>
                </div>
                {{-- @if ($current->description)
                    <div class="text-gray-800 text-xs font-semibold md:text-base text-justify">
                        {!! $current->description->name !!}
                    </div>
                @endif --}}
                <div class="flex justify-between">
                    {{-- Seccion de marca seccion como culminada --}}
                    <div class="card px-4 py-2 w-full  justify-center flex flex-1 items-center mt-4 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                        wire:click="completed">
                        @if ($current->completed)
                            <i class="fas fa-toggle-on text-2xl text-yellow-600"></i>
                            <p class="text-xs md:text-sm  ml-2 text-gray-800 font-bold">
                                Leccíon culminada
                            </p>
                        @else
                            <i class="fas fa-toggle-off text-2xl text-gray-800"></i>
                            <p class="text-xs md:text-sm ml-2 text-gray-800 font-bold">Marcar esta leccion como
                                terminada
                            </p>
                        @endif
                    </div>
                    {{-- boton para descargar el recurso --}}
                    @if ($current->resource)
                        <div
                            class="card px-4 ml-4 py-2 w-full  justify-center flex flex-1 items-center mt-4 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <div class="flex items-center text-blue-500 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                wire:click="download">
                                <i class="fas fa-download text-lg"></i>
                                <p class="text-xs md:text-sm ml-2 font-bold">Descargar recurso</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card mt-4">
                    <div class="card-body flex text-gray-50 text-xs font-bold">
                        @if ($this->previous)
                            <a wire:click="changeLesson({{ $this->previous }})"
                                class="bg-gray-800 rounded-full px-4 py-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                < Anterior</a>
                        @endif
                        @if ($this->next)
                            <a wire:click="changeLesson({{ $this->next }})"
                                class="ml-auto bg-gray-800 rounded-full px-4 py-2  cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">Siguiente
                                ></a>
                        @endif
                    </div>
                </div>

                <div class="card my-4 text-gray-800 fondodieta select-none">
                    @if ($current->description)
                        <div class="card-body">
                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 ">
                                <article>
                                    <figure>
                                        <img class="rounded-xl h-144 w-full object-cover"
                                            src="{{ asset('img/home/dieta.jpg') }}" alt="img-propietario">
                                    </figure>
                                </article>

                                <div class="p-4 my-auto">
                                    <div class="flex items-center justify-center">
                                        <h1 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-center">Dieta diaria
                                        </h1>
                                        <i class="text-lg md:text-2xl text-red-800 fas fa-apple-alt text-center mb-2 md:mb-5 ml-2"></i>
                                    </div>
                                    <div class="tracking-widest text-xs md:text-sm font-semibold text-justify">
                                        {{ $current->description->name }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="text-sm md:text-xl font-bold text-gray-800 mb-4">{{ $plan->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="h-12 w-12 mr-4 rounded-full object-cover"
                            src="{{ $plan->teacher->profile_photo_url }}" alt="">
                    </figure>
                    <div>
                        <p class="text-xs md:text-base font-bold">{{ $plan->teacher->name }}</p>
                        <a
                            class="text-yellow-500 text-xs md:text-base">{{ '@' . Str::slug($plan->teacher->name, '') }}</a>
                    </div>
                </div>
                <!--BARRA DE PROGRESO-->
                <p class="text-gray-700 text-xs md:text-sm pt-5 font-bold">{{ $this->advance . '%' . ' ' }}Completado
                </p>
                <div class="relative pb-2">
                    @if ($this->advance == 100)
                        <p class="text-blue-500 text-lg font-bold">Felicidades has concluido con el plan..!!</p>

                        <img src="{{ asset('img/home/felicidades.gif') }}" alt="">
                    @else
                        <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-lg bg-gray-800">
                            <div style="width:{{ $this->advance . '%' }}"
                                class="animate-pulse rounded-r-md shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500 transition-all duration-700">
                            </div>
                        </div>
                    @endif
                </div>
                <ul>
                    @foreach ($plan->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a
                                class="font-bold text-sm md:text-base inline-block mb-3 text-yellow-600">{{ $section->name }}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-yellow-400 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span
                                                        class="inline-block w-4 h-4 border-2 border-gray-800 rounded-full mr-2 mt-1 animate-pulse"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-gray-800 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="text-xs md:text-base font-medium text-gray-800 cursor-pointer hover:underline"
                                            wire:click="changeLesson({{ $lesson }})">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    @push('js')
        <script>
            function disableIE() {
                if (document.all) {
                    return false;
                }
            }

            function disableNS(e) {
                if (document.layers || (document.getElementById && !document.all)) {
                    if (e.which == 2 || e.which == 3) {
                        return false;
                    }
                }
            }
            if (document.layers) {
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown = disableNS;
            } else {
                document.onmouseup = disableNS;
                document.oncontextmenu = disableIE;
            }
            document.oncontextmenu = new Function("return false");
        </script>
    @endpush
</div>
