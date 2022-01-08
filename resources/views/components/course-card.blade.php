
@props(['plan'])
<!--ESTE ES EL COMPONENTE DEL CARD-->

<article class="card flex flex-col  bg-gray-50  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 rounded-lg object-cover">
    
    <figure>
        <img class="h-36 w-full object-cover" src="{{Storage::url($plan->image->url)}}" alt="">
    </figure>
    <div class="card-body flex-1 flex flex-col">
        <h1 class="text-lg text-gray-600">{{Str::limit($plan->title, 40)}}</h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto"><b>Instructor: </b>{{ $plan->teacher->name }}</p>

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
            
            <p class="text-gray-500 text-sm ml-auto">
                <i class="fas fa-users"></i>
                ({{$plan->students_count}})
            </p>
        </div>

        @if ($plan->price->value == 0)
            <p class="text-green-700 font-bold my-2">Gratis</p>
        @else
            <p class="text-gray-500 font-bold my-2">Precio:&nbsp;{{ $plan->price->value }}$</p>
        @endif
        @can('enrolled', $plan)
        <a href="{{route('planes.show', $plan)}}" class="btn-block font-bold rounded mt-3 text-white py-2 px-4 bg-blue-500 hover:bg-blue-700">
            Mi Plan
        </a>
        @else
        <a href="{{route('planes.show', $plan)}}" class="btn-block font-bold rounded mt-3 text-white py-2 px-4 bg-red-500 hover:bg-red-700">
            Mas información
        </a>
        @endcan


    </div>
</article>