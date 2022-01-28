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
</div>
