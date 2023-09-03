<div wire:init="loadSlider">
    <style>
        .altura-slider {
            height: 100vh;
        }

        @media only screen and (max-width: 650px) {
            .altura-slider {
                height: 38.15vh;
                /* Altura para dispositivos móviles */
            }
        }

        /* Media query para tablets */
        @media only screen and (min-width: 651px) and (max-width: 1023px) {
            .altura-slider {
                height: 400px;
                /* Altura para tablets */
            }
        }

        /* Media query para laptops */
        @media only screen and (min-width: 1024px) and (max-width: 1365px) {
            .altura-slider {
                height: 600px;
                /* Altura para laptops */
            }
        }

        /* Media query para PCs */
        @media only screen and (min-width: 1366px) {
            .altura-slider {
                height: 100vh;
                /* Altura para PCs */
            }
        }

        /*  @media (max-width: 600px) {
            .altura-slider {
                height: 26vh;
            }
        }
        @media (max-width: 700px) {
            .altura-slider {
                height: 38.15vh;
            }
        }

        @media (max-width: 950px) {
            .altura-slider {
                height: 45vh;
            }
        }
        
        @media (max-width: 1000px) {
            .altura-slider {
                height: 272.39px;
            }
        } */
    </style>
    @push('css')
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css') }}" />
    @endpush
    <section class="altura-slider {{-- filo --}} relative bg-black">
        @if (count($sliders))
            <div class="swiper">
                <div class="swiper-wrapper relative">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide posicion1">
                            <img class="w-full object-cover bg-cover h-full" src="{{ Storage::url($slider->imagen) }}"
                                alt="{{ $slider->imagen }}">
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="altura-slider flex justify-center items-center bg-transparent shadow-xlbg-black">
                <div class="text-white text-lg {{-- animate-spin ease duration-300 w-16 h-16 rounded-full border-2 border-yellow-500 --}}">
                    Cargando Portada...
                </div>
            </div>
        @endif
    </section>
    @push('js')
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js') }}"></script>
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
</div>
