<div wire:init="loadSlider"> 
  @if (count($sliders))
    <section class="altura portada filo relative filo bg-black">
        <div class="swiper">
            <div class="swiper-wrapper relative">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide posicion1">
                        <img class="w-full object-cover" src="{{ Storage::url($slider->imagen) }}" alt="{{$slider->imagen}}">
                    </div>
                @endforeach
                    {{-- <div class="swiper-slide posicion1">
                        <img class="w-full object-cover" src="{{ asset('img/home/gym.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide posicion1">
                        <img class="w-full object-cover" src="{{ asset('img/home/sentadilla.jpg') }}" alt="">
                    </div> --}}
            </div>
            <!-- Add Pagination -->
        <div class="hidden md:block swiper-pagination swiper-pagination-white"></div>
            <!-- Add Navigation -->
            {{--  <div class="hidden md:block swiper-button-prev swiper-button-white"></div>
            <div class="hidden md:block swiper-button-next swiper-button-white"></div> --}}
        </div>
    </section>
    {{-- <section style="" class="absolute z-10 hidden md:block text-center baner px-14 md:px-0 ">
        <div
            class="max-w-2xl md:max-w-3xl mx-auto px-2 md:px-4 sm:px-6 lg:px-16 py-5 md:py-10 bg-black bg-opacity-50 rounded-xl">
            <div class="w-full md:w-1/2 lg:w-full select-none justify-center ">
                <h1 class="text-yellow-500 font-extrabold text-base md:text-4xl mb-1 md:mb-6">BIENVENIDO A FITKING</h1>
                <p class="text-white font-bolt text-xs md:text-2xl mb-0 md:mb-4">Platatorma donde puedes conseguir el
                    plan ideal para
                    llevar tu cuerpo al siguiente nivel.</p>
                <!--Aqui va el buscador-->
                <div class="hidden md:block">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
    <section class="w-full relative -mt-32 z-10 hidden md:block">
        <a href="#fitking" class="flex justify-center">
            <svg class="animate-bounce w-10 h-10 text-yellow-600 font-extrabold bg-white bg-opacity-70 rounded-full p-1"
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
    </section> --}}
  @else
    <div class="mb-4 min-h-screen flex justify-center items-center bg-transparent shadow-xl bg-black">
        <div class="rounded animate-spin ease duration-300 w-16 h-16 border-2 border-yellow-500"></div>
    </div>
  @endif      
</div>
