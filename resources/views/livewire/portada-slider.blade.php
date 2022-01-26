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
            height: 26vh;
        }
    }


</style>
  @if (count($sliders))
    <section class="altura portada filo relative filo bg-black">
        <div class="swiper">
            <div class="swiper-wrapper relative">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide posicion1">
                        <img class="w-full object-cover h-full" src="{{ Storage::url($slider->imagen) }}" alt="{{$slider->imagen}}">
                    </div>
                @endforeach
            </div>
    </section>
  @else
    <div class="mb-4 alturaslidercarga flex justify-center items-center bg-transparent shadow-xl bg-black">
        <div class="rounded animate-spin ease duration-300 w-16 h-16 border-2 border-yellow-500"></div>
    </div>
  @endif      
</div>
