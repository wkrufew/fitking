<x-app-layout>
    {{-- INICIO SEO --}}
    @section('title', 'Contact')
    @section('description', 'FITKING, es una empresa dedicada a al entrenamiento presonalizado y venta de prodcutos
        fitness como proteinas, creatinas, pre-entrenos entre otros.')
    @section('url', route('contact'))
    @section('img', asset('img/home/sports.jpg'))
    {{-- FIN SEO --}}

    <style>
        .fondo {
            background-color: #000000;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(329,768,357)'%3E%3Cstop offset='0' stop-color='%23000000'/%3E%3Cstop offset='1' stop-color='%23896B0C'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='508' height='423.3' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <section
        class="fondo pb-4 md:pb-8 mb-8 md:mb-12 pt-20 md:pt-28 relative rounded-b-md border-b-2 border-yellow-500 select-none">
        <div class="container">
            <div class="flex-col space-y-2 py-4 md:py-10">
                <h1 class="text-center text-2xl text-yellow-500 font-bold">
                    {{ __('FITKING') }}
                </h1>
                <p class="text-center max-w-xl mx-auto text-base md:text-xl text-white">
                    {{ __('Es una empresa dedicada a cambiar vidas sacando la mejor version de la persona que se comprometa con el cambio, donde pondremos a disposicion entrenamientos personalizados, suplementos y vestimenta.') }}
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-3 md:px-6 py-6 rounded-2xl">
          
       {{--  <div class="flex-col space-y-2 bg-white shadow-lg rounded-2xl p-6">
            <h1 class="text-center font-bold">
                {{ __('CONTACTANOS') }}
            </h1>
            <p class="text-center max-w-xl mx-auto">
                {{ __('Es una empresa dedicada a cambiar vidas sacando la mejor version de la persona que se comprometa con el cambio, donde pondremos a disposicion entrenamientos personalizados, suplementos y vestimenta.') }}
            </p>
        </div> --}}

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
                            <div class="text-sm">{{ $settings['adderss'] }}</div>
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
                <iframe class="w-full h-full object-cover"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.8616028420856!2d-79.13195309999999!3d-2.2059355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d2bb6104c229c3%3A0x9858ca10be689b7c!2sFITKING!5e0!3m2!1ses-419!2sec!4v1681235618803!5m2!1ses-419!2sec"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</x-app-layout>
