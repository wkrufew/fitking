<div wire:init="loadSlider"> 
  <style>
    
    .alturaslidercarga {
        height: 100vh;
    }

    @media screen and (max-width: 600px) {
        .alturaslidercarga {
            height: 26vh;
        }
    }
    @media screen and (max-width: 950px) {
        .alturaslidercarga {
            height: 272.39px;
        }
    }
</style>        
    @push('css')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css') }}"/>
    @endpush
    <section class="altura portada filo relative bg-black">
        @if (count($sliders))
        <div class="swiper">
            <div class="swiper-wrapper relative">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide posicion1">
                        <img class="w-full object-cover h-full" src="{{ Storage::url($slider->imagen) }}" alt="{{$slider->imagen}}">
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <div class="alturaslidercarga flex justify-center items-center bg-transparent shadow-xlbg-black">
                <div class="animate-spin ease duration-300 w-16 h-16 border-2 border-yellow-500"></div>
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
