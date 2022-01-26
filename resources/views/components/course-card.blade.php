@props(['plan'])
<!--ESTE ES EL COMPONENTE DEL CARD-->
<article class="select-none flex flex-col  bg-black border-2 border-yellow-500 transition duration-300 ease transform hover:-translate-y-0 hover:scale-105">
    <figure>
        <img class="h-36 w-full object-cover" src="{{Storage::url($plan->image->url)}}" alt="{{$plan->slug}}">
    </figure>
    <div class="card-body flex-1 flex flex-col">
        <h2 class="text-base text-gray-100 uppercase font-semibold mb-4">{{Str::limit($plan->title, 35)}}</h2>
        <h1 class="text-base text-justify text-gray-100 mb-4">{{$plan->subtitle}}</h1>
        <p class="text-gray-100 text-sm mb-4 mt-auto"><b>Instructor: </b>{{ $plan->teacher->name }}</p>
        <div class="flex ">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{$plan->rating >= 1 ? 'yellow' : 'gray'}}-500"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$plan->rating >= 2 ? 'yellow' : 'gray'}}-500"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$plan->rating >= 3 ? 'yellow' : 'gray'}}-500"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$plan->rating >= 4 ? 'yellow' : 'gray'}}-500"></i>
                </li>
                <li class="mr-1">
                    <i class="fas fa-star text-{{$plan->rating == 5 ? 'yellow' : 'gray'}}-500"></i>
                </li>
            </ul>
            <p class="text-gray-200 text-sm ml-auto">
                <i class="fas fa-users"></i>
                    @if ($plan->students_count > 34)
                        ({{ $plan->students_count }})
                    @else
                        ({{(random_int(35, 46))}})
                    @endif
            </p>
        </div>
        @if ($plan->price->value == 0)
            <p class="text-green-700 font-bold my-4">Gratis</p>
        @else
            <p class="text-gray-100 font-bold my-4">Precio:&nbsp;{{ $plan->price->value }}$</p>
        @endif
        {{-- @can('enrolled', $plan)
        <a href="{{route('planes.show', $plan)}}" class="btn-block font-bold rounded mt-3 text-white py-2 px-4 bg-blue-500 hover:bg-blue-700">
            Mi Plan
        </a>
        @else
        <a href="{{route('planes.show', $plan)}}" class="btn-block font-bold rounded mt-3 text-white py-2 px-4 bg-red-500 hover:bg-red-700">
            Mas información
        </a> --}}
        <hr>
        @can('enrolled', $plan)
        <a href="{{route('planes.show', $plan)}}" class="text-center mx-auto justify-items-center mt-3 flex text-yellow-500 font-bold hover:text-gray-100">
            <span>VER MAS</span>
            <svg class="w-6 h-6 transform -rotate-90 my-auto ml-2"
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
        @else
        <a href="{{route('planes.show', $plan)}}" class="text-center mx-auto justify-items-center mt-3 flex text-yellow-500 font-bold hover:text-gray-100">
            <span>VER MAS</span>
            <svg class="w-6 h-6 transform -rotate-90 my-auto ml-2"
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a>
        @endcan
    </div>
</article>