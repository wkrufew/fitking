<x-app-layout>
    {{-- INICIO SEO --}}
        @section('title', 'Contact')
        @section('description', 'FITKING, es una empresa dedicada a al entrenamiento presonalizado y venta de prodcutos fitness como proteinas, creatinas, pre-entrenos entre otros.')
        @section('url', route('contact'))
        @section('img', asset('img/home/sports.jpg'))
     {{-- FIN SEO --}}

    <div class="py-7 md:py-4 bg-black"></div>
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
    <div class="max-w-7xl mx-auto px-3 md:px-6 py-6 rounded-2xl">
        <div class="flex-col space-y-2 bg-white shadow-lg rounded-2xl p-6">
            <h1 class="text-center font-bold">
                {{ __('CONTACTANOS') }}
            </h1>
            <p class="text-center max-w-xl mx-auto">
                {{ __('Es una empresa dedicada a cambiar vidas sacando la mejor version de la persona que se comprometa con el cambio, donde pondremos a disposicion entrenamientos personalizados, suplementos y vestimenta.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 justify-center pt-6 gap-2 md:gap-6">

            <div class="space-y-6 bg-white rounded-lg shadow-lg py-4 md:py-6 px-6 md:px-10">
                <h1 class="text-center font-semibold text-base"> {{ __('DATOS DE LA EMPRESA') }}</h1>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-landmark text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold">{{ __('Empresa') }}</span>
                            <div class="text-sm"> {{ $settings['shopname'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-phone text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold">{{ __('Teléfono') }}</span>
                            <div class="text-sm"> {{ $settings['phone'] }}</div>
                            {{-- <div class="text-sm"> {{ $settings['phone2']}}</div> --}}
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-envelope text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold">{{ __('Email') }}</span>
                            <div class="text-sm"> {{ $settings['email'] }}</div>
                           {{--  <div class="text-sm"> {{ $settings['email2']}}</div> --}}
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-location-dot text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold">{{ __('Ubicación') }}</span>
                            <div class="text-sm"> Chimborazo - Cumanda</div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="rounded-full bg-neutral-800 w-10 h-10 flex justify-center items-center">
                        <i class="fa-solid fa-location-crosshairs text-xl text-white"></i>
                    </div>
                    <div class="flex-col my-auto mx-auto space-y-1">
                        <div>
                            <span class="font-semibold">{{ __('Dirección') }}</span>
                            <div class="text-sm">{{ $settings['adderss']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6 bg-white rounded-lg shadow-lg p-3 md:p-6 mt-4 md:mt-0">
                <div class="text-center font-semibold text-base">{{ __('FORMULARIO DE CONTACTO') }}</div>
                @livewire('contact-component')
            </div>
        </div>
        <div class="my-6 rounded-lg shadow-lg bg-white overflow-hidden">
            <div class="text-sm font-semibold text-center py-2">
                {{ __('UBICACIÓN DE LA EMPRESA') }}
            </div>
            <div class="w-full h-80">
                <iframe class="w-full h-full object-cover" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8616028420856!2d-79.13195309999999!3d-2.2059355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d2bb6104c229c3%3A0x9858ca10be689b7c!2sFITKING!5e0!3m2!1ses-419!2sec!4v1681235618803!5m2!1ses-419!2sec" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>   
        </div>
    </div>
</x-app-layout>
