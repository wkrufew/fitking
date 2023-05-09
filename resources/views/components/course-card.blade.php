@props(['plan'])
<!--ESTE ES EL COMPONENTE DEL CARD-->
<article class="select-none flex flex-col overflow-hidden {{-- max-w-2xl --}} bg-white rounded-md border-2 border-gray-200 shadow-lg transition duration-300 ease transform hover:-translate-y-0 hover:scale-105">
    <figure>
        <img class="h-36 w-full object-cover " src="{{Storage::url($plan->image->url)}}" alt="{{$plan->slug}}">
    </figure>
    <div class="card-body flex-1 flex flex-col">
        <h2 class="text-base text-gray-700 uppercase font-semibold mb-4">{{Str::limit($plan->title, 25)}}</h2>
        <h1 class="text-base text-justify text-gray-700 mb-2">{{Str::limit($plan->subtitle, 60)}}</h1>
        {{-- <p class="text-gray-600 text-sm mb-2 mt-auto"><b>Instructor: </b>{{ $plan->teacher->name }}</p> --}}
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
            <p class="text-gray-600 text-sm ml-auto">
                <i class="fas fa-users"></i>
                    @if ($plan->students_count > 3)
                        ({{ $plan->students_count }})
                    @else
                        ({{(random_int(10, 20))}})
                    @endif
            </p>
        </div>
        @if ($plan->price->value == 0)
            <p class="text-green-700 font-bold my-2">Gratis</p>
        @else
            <p class="text-gray-700 font-bold my-2">Precio:&nbsp;{{ $plan->price->value }}$</p>
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
        
        <a href="{{route('planes.show', $plan)}}" class="text-center mx-auto justify-items-center mt-3 flex text-yellow-500 font-bold hover:text-gray-100">
            <span class="bg-black rounded-md px-4 py-2 flex group">
                @can('enrolled', $plan)
                    VER MI PLAN
                @else
                    VER PLAN
                @endcan
                <svg class="w-6 h-6 transform -rotate-90 my-auto ml-1 group-hover:translate-x-2 transition "
                    fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </span>
        </a>
        
        {{-- <a href="{{route('planes.show', $plan)}}" class="text-center mx-auto justify-items-center mt-3 flex text-yellow-500 font-bold hover:text-gray-100">
            <span>VER MAS</span>
            <svg class="w-6 h-6 transform -rotate-90 my-auto ml-2"
                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </a> --}}
        
    </div>
</article>