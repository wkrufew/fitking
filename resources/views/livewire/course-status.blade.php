<div class="">
    <div class="relative h-16 lg:h-20 w-full bg-black mb-4">
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
    
    <div class="container mx-auto px-4 lg:px-8 mb-4">
        <div class="">
            <a class="w-24 lg:w-28 flex text-neutral-300 bg-black p-2 rounded-md hover:text-yellow-500 cursor-pointer group" href="{{route('planes.show', $plan)}}">
                <span>
                    <svg class="w-4 h-4 lg:w-6 lg:h-6 transform rotate-90 my-auto mr-2 group-hover:w-7 transition-all"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </span>
                <span class="text-xs lg:text-base">Regresar</span> 
            </a>
        </div>
    </div>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-x-2 md:gap-x-8 select-none">
        <div class="lg:col-span-2 mb-0 lg:mb-4">
            <div class="md:sticky md:top-16">
                <div class="card rounded-md relative overflow-hidden">
                        <div class="relative">
                            <div class="embed-responsive relative w-full aspect-video px-36 md:px-16 lg:px-44 rounded-t-lg select-none">
                                {!! $current->iframe !!}
                            </div>
                            <div class="block lg:hidden">
                                <div style="z-index: 900" class="absolute top-0 left-0 w-full h-full px-36 md:px-16 lg:px-44 rounded-t-lg select-none portrait:hidden bg-gray-800 text-white">
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
                    <div class="card rounded-md bg-black px-4 py-2 w-full  justify-center flex flex-1 items-center mt-4 cursor-pointer "
                        wire:click="completed">
                        @if ($current->completed)
                            <i class="fas fa-toggle-on text-2xl text-yellow-600"></i>
                            <p class="text-xs md:text-sm  ml-2 text-gray-300 font-bold">
                                Leccón culminada
                            </p>
                        @else
                            <i class="fas fa-toggle-off text-2xl text-gray-300"></i>
                            <p class="text-xs md:text-sm ml-2 text-gray-300 font-bold">
                                Marcar como terminada
                            </p>
                        @endif
                    </div>
                    {{-- boton para descargar el recurso --}}
                    @if ($current->resource)
                        <div class="card rounded-md px-4 ml-4 py-2 w-full  justify-center flex flex-1 items-center mt-4 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <div class="flex items-center text-blue-500 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                wire:click="download">
                                <i class="fas fa-download text-lg"></i>
                                <p class="text-xs md:text-sm ml-2 font-bold">Descargar recurso</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card rounded-md mt-4">
                    <div class="card-body bg-black flex text-gray-50 text-xs font-bold">
                        @if ($this->previous)
                            <a wire:click="changeLesson({{ $this->previous }})"
                                class="bg-neutral-800 rounded-full px-4 py-1.5 cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
                                < Anterior</a>
                        @endif
                        @if ($this->next)
                            <a wire:click="changeLesson({{ $this->next }})"
                                class="ml-auto bg-neutral-800 rounded-full px-4 py-1.5  cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">Siguiente
                                ></a>
                        @endif
                    </div>
                </div>

                <div class="card rounded-md my-2 lg:my-4 bg-black text-neutral-200 fondodieta select-none">
                    @if ($current->description)
                        <div class="card-body">
                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 ">
                                <article>
                                    <figure>
                                        <img class="rounded-md h-144 w-full object-cover"
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
        <div class="mb-4">
            <div class="">
               <div class="hidden md:block card card-body rounded-md mb-4 bg-black">
                    <div class="flex items-center justify-center">
                        <figure>
                            <img class="h-12 w-12 mr-4 rounded-full object-cover"
                                src="{{ $plan->teacher->profile_photo_url }}" alt="">
                        </figure>
                        <div>
                            <p class="text-xs md:text-base font-bold text-gray-200">{{ $plan->teacher->name }}</p>
                            <a class="text-neutral-400 text-xs md:text-base">Instructor</a>
                                {{-- class="text-yellow-500 text-xs md:text-base">{{ '@' . Str::slug($plan->teacher->name, '') }}</a> --}}
                        </div>
                    </div>
               </div>
                
                <div class="">
                    <div class="card rounded-md p-3 mb-4 bg-black">
                        <h1 class="text-sm md:text-lg font-bold text-gray-300 pb-2 text-center">{{ $plan->title }}</h1>
                        <!--BARRA DE PROGRESO-->
                        {{-- <p class="text-gray-700 text-xs md:text-sm font-bold">{{ $this->advance . '%' . ' ' }}Completado --}}
                        </p>
                        <div class="relative">
                            {{-- imagen de felicidades --}}
                            @if ($this->advance == 100)
                                <p class="text-blue-500 text-lg font-bold">Felicidades has concluido con el plan..!!</p>
                                <img src="{{ asset('img/home/felicidades.gif') }}" alt="aplausos">
                            @else
                            {{-- barra de prograso --}}
                                <div class="overflow-hidden h-6 text-xs flex rounded-md bg-neutral-800 border border-neutral-700">
                                    <div style="width:{{ $this->advance . '%' }}"
                                        class="{{-- animate-pulse --}} rounded-r-md shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500 transition-all duration-700">
                                        <span class="text-xs p-1 text-center">
                                            {{ $this->advance . '%' . ' ' }} Completado
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <ul class="bg-black p-3 rounded-md">
                        <div class="hidden md:block">
                            <h2 class="text-sm md:text-lg font-bold text-gray-300 pb-2 text-center">Lecciones del Plan</h2>
                            <hr class=" pb-2">
                        </div>
                        @foreach ($plan->sections as $section)
                            <li class="text-gray-600 mb-4 rounded-md">{{-- toda la seccion --}}
                                <a class="font-medium text-sm md:text-base inline-block mb-3 text-gray-300">{{ $section->name }}</a>
                                <ul class="{{-- bg-blue-500 --}} space-y-1"> {{-- todas las lecciones --}}
                                    @foreach ($section->lessons as $lesson)
                                        <li class="flex bg-neutral-800 border border-neutral-700  rounded-md py-1 items-center cursor-pointer hover:bg-neutral-700" wire:click="changeLesson({{ $lesson }})">
                                            <div class="">
                                                @if ($lesson->completed)
                                                    @if ($current->id == $lesson->id)
                                                        {{-- <span class="inline-block w-4 h-4 border-2 border-yellow-400 rounded-full mx-2 mt-1"></span> --}}
                                                        <i class="inline-block w-4 h-4 mx-2 mt-1 fas fa-play-circle text-yellow-500 animate-pulse"></i>
                                                        {{-- aqui va cuando esta completada y viendose --}}
                                                    @else
                                                        {{-- <span class="inline-block w-4 h-4 bg-yellow-500 rounded-full mx-2 mt-1"></span> --}}
                                                        <i class="inline-block w-4 h-4 mx-2 mt-1 fa-solid fa-circle-check text-yellow-500"></i>
                                                    @endif
                                                    <a  class="text-xs md:text-sm {{$current->id == $lesson->id ? 'text-yellow-500 animate-pulse' : 'text-gray-100 line-through'}}" title="{{ $lesson->name }}">
                                                        {{Str::limit($lesson->name, 43)}}
                                                    </a>
                                                @else
                                                    @if ($current->id == $lesson->id)
                                                        {{-- <span class="inline-block w-4 h-4 border-2 border-neutral-500 rounded-full mx-2 mt-1 animate-pulse"></span> --}}
                                                        <i class="inline-block w-4 h-4 mx-2 mt-1 fas fa-play-circle text-yellow-500 animate-pulse"></i>
                                                    @else
                                                        {{-- <span class="inline-block w-4 h-4 bg-neutral-500 rounded-full mx-2 mt-1"></span> --}}
                                                        <i class="inline-block w-4 h-4 mx-2 mt-1 fa-solid fa-circle-check text-neutral-500"></i>
                                                        {{-- aqui va cuando no esta visto ni en reproduccion --}}
                                                    @endif
                                                    <a  class="hidden lg:inline-block text-xs md:text-sm {{$current->id == $lesson->id ? 'text-yellow-500 animate-pulse' : 'text-gray-100'}}" title="{{ $lesson->name }}">
                                                            {{Str::limit($lesson->name, 43)}}
                                                    </a>
                                                    <a  class=" inline-block lg:hidden text-xs md:text-sm {{$current->id == $lesson->id ? 'text-yellow-500 animate-pulse' : 'text-gray-100'}}" title="{{ $lesson->name }}">
                                                            {{Str::limit($lesson->name, 32)}}
                                                    </a>
                                                @endif
                                            </div>
                                            {{-- <a  class="text-xs md:text-sm {{$current->id == $lesson->id ? 'text-yellow-500 animate-pulse' : 'text-gray-100'}}" title="{{ $lesson->name }}">
                                                {{Str::limit($lesson->name, 43)}}
                                            </a> --}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
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
