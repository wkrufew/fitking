@props(['plan'])
<!--ESTE ES EL COMPONENTE DEL CARD-->
<article
    class="select-none flex flex-col overflow-hidden bg-white rounded-md border-2 border-gray-200 shadow-xl transition duration-300 ease transform hover:-translate-y-0 hover:scale-105">
    <figure>
        <img class="h-36 w-full object-cover rounded-b-md " src="{{ Storage::url($plan->image->url) }}"
            alt="{{ $plan->slug }}">
    </figure>
    <div class="card-body flex-1 flex flex-col">
        <h2 class="text-sm md:text-base text-gray-700 uppercase font-semibold mb-2">{{ Str::limit($plan->title, 25) }}
        </h2>
        <h1 class="text-sm md:text-base text-gray-700 mb-2">{{ Str::limit($plan->subtitle, 60) }}</h1>
        <div class="flex ">
            <ul class="flex text-sm">
                @php
                    $avgRating = $plan->reviews_avg_rating ?? 0;
                    $roundedRating = round($avgRating, 1);
                @endphp

                @if ($avgRating > 0)
                    <ul class="flex space-x-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $i <= $avgRating ? 'yellow' : 'gray' }}-500"></i>
                            </li>
                        @endfor
                        <li>
                            ({{ $roundedRating }})
                        </li>
                    </ul>
                @else
                    <span class="text-gray-400">Sin calificaciones</span>
                @endif
            </ul>
            <p class="text-gray-600 text-sm ml-auto">
                <i class="fas fa-users"></i> ({{ $plan->students_count }})
            </p>
        </div>
        {{-- @if ($plan->price->value == 0)
            <p class="text-green-700 font-bold my-2 text-sm md:text-base">Gratis</p>
        @else
            <p class="text-gray-700 font-bold my-2 text-sm md:text-base">Precio:&nbsp;{{ $plan->price->value }}$</p>
        @endif --}}
        @php
            $priceValue = $plan->price->value;
            $isFree = $priceValue == 0;
            $priceText = $isFree ? 'Gratis' : 'Precio: ' . $priceValue . '$';
            $textColor = $isFree ? 'text-green-700' : 'text-gray-700';
        @endphp
        <p class="font-bold my-2 text-sm md:text-base {{ $textColor }}">{{ $priceText }}</p>
        <hr>
        <a href="{{ route('planes.show', $plan) }}"
            class="text-center mx-auto justify-items-center mt-3 flex text-yellow-500 font-bold hover:text-gray-100">
            <span class="bg-black rounded-md px-4 py-2 flex group text-sm md:text-base">
                VER PLAN
                <svg class="w-4 md:w-6 h-4 md:h-6 transform -rotate-90 my-auto ml-1 group-hover:translate-x-2 transition "
                    fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </span>
        </a>
    </div>
</article>
