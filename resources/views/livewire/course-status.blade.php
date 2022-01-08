<div>
    <div class="py-7 md:py-8 bg-black"></div>
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#000000">
                    <path
                        d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                    </path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#220FDC">
                    <g
                        transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"></path>
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>

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
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-2 md:gap-8">
       
        <div class="lg:col-span-2 mb-0 md:mb-4">
            <div class="md:sticky md:top-16">
                <div class="card">
                    <div class="embed-responsive rounded-t-lg">
                        {!! $current->iframe !!}
                    </div>
                    <div >
                        <h2 class="text-sm mx-auto md:text-lg text-gray-800 font-bold mt-2 mb-2 text-center">{{ $current->name }}</h2>
                    </div>
                </div>
                {{-- @if ($current->description)
                    <div class="text-gray-800 text-xs font-semibold md:text-base text-justify">

                        {!! $current->description->name !!}
                    </div>
                @endif --}}


                <div class="flex justify-between">
                    {{-- Seccion de marca seccion como culminada --}}
                    <div class="card px-4 py-2 w-full  justify-center flex items-center mt-4 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                        wire:click="completed">
                        @if ($current->completed)
                            <i class="fas fa-toggle-on text-2xl text-yellow-600"></i>
                            <p class="text-xs md:text-sm  ml-2 text-gray-800 font-bold">Leccíon culminada</p>
                        @else
                            <i class="fas fa-toggle-off text-2xl text-gray-800"></i>
                            <p class="text-xs md:text-sm ml-2 text-gray-800 font-bold">Marcar esta leccion como terminada</p>
                        @endif
                    </div>
                    {{-- boton para descargar el recurso --}}
                    @if ($current->resource)
                        <div class="flex items-center text-blue-500 mt-4 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                            wire:click="download">
                            <i class="fas fa-download text-lg"></i>
                            <p class="text-sm ml-2 font-bold">Descargar recurso</p>
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

                <div class="card my-4 text-gray-800 fondodieta">
                    @if ($current->description)
                        <div class="card-body">
                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 ">
                                <article>
                                    <figure>
                                        <img class="rounded-xl h-144 w-full object-cover" src="{{ asset('img/home/dieta.jpg') }}"
                                            alt="img-propietario">
                                    </figure>
                                </article>
                                
                                <div class="p-4 my-auto">
                                    <div class="flex items-center justify-center">
                                        <h1 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-center">Dieta diaria</h1>
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
                        <a class="text-yellow-500 text-xs md:text-base">{{ '@' . Str::slug($plan->teacher->name, '') }}</a>
                    </div>
                </div>
                <!--BARRA DE PROGRESO-->
                <p class="text-gray-700 text-xs md:text-sm pt-5 font-bold">{{ $this->advance . '%' . ' ' }}Completado</p>
                <div class="relative pb-2">
                    @if ($this->advance == 100)
                        <p class="text-blue-500 text-lg font-bold">Felicidades has concluido con el plan..!!</p>

                        <img src="{{ asset('img/home/felicidades.gif') }}" alt="">
                    @else
                        <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-lg bg-gray-800">
                            <div style="width:{{ $this->advance . '%' }}"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500 transition-all duration-700">
                            </div>
                        </div>
                    @endif
                </div>
                <ul>
                    @foreach ($plan->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-sm md:text-base inline-block mb-3 text-yellow-600">{{ $section->name }}</a>
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
                                                        class="inline-block w-4 h-4 border-2 border-gray-800 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span
                                                        class="inline-block w-4 h-4 bg-gray-700 rounded-full mr-2 mt-1"></span>
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
</div>
