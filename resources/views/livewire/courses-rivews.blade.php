<section class="pb-6">
    <h1 class="font-bold text-blue-500 text-base md:text-lg mb-2 mt-0">Calificaciones</h1>

    @can('enrolled', $course)
        <article class="mb-3">
            @can('valued', $course)

                <textarea wire:model = "comment" class="block w-full text-xs md:text-base py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escribe un comentario" rows="2"></textarea>
                
                <div class="flex items-center mt-2 mb-2">
                    <button wire:click = "store" class="btn btn-primary text-xs md:text-base ">Publicar</button>

                    <ul class="flex ml-2">
                        <li wire:click="$set('rating', 1)" class="mr-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li wire:click="$set('rating', 2)" class="mr-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li wire:click="$set('rating', 3)" class="mr-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li wire:click="$set('rating', 4)" class="mr-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                        <li wire:click="$set('rating', 5)" class="mr-2 cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-500"></i>
                        </li>
                    </ul>
                </div>
            @else 
                <div class="rounded-lg flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p class="text-xs md:text-base">Has realizado la calificacion del plan con exito</p>
                </div>   
            @endcan
        </article>
    @else  
        <div class="mb-2 px-4 py-3 leading-normal text-blue-500 bg-white rounded-lg" role="alert">
            <p class="text-xs md:text-base"><b>Nota: </b> Para realizar una calificacion del plan debes estar matriculado</p>
        </div>
    @endcan
    <div class="card  px-0">
        <div class="py-2 px-2 md:py-3 md:px-4 bg-white">
            {{-- <p class="text-gray-800 text-xs md:text-lg mb-2"><b>Valoraciones: &nbsp;</b>{{ $course->reviews->count()}}</p> --}}
            <p class="text-gray-800 text-xs md:text-lg mb-2"><b>Calificaciones: &nbsp;</b>{{ $course->reviews_count}}</p>
            @forelse ($course->reviews->reverse() as $review)
                <article class="flex mb-4 text-gray-800 select-none ">
                    <img class="rounded-full h-12 w-12 object-cover shadow-lg border-2 border-white" src="{{$review->user->profile_photo_url}}" alt="">
                </figure>
                <div class="card flex-1 ml-1">
                    <div class="px-2 py-2 md:px-4 md:py-3 bg-white relative ">
                        <p class="text-xs md:text-sm"><b>{{$review->user->name}}</b> <i class="fas fa-star text-yellow-500 ml-2 mr-1"></i>({{$review->rating}})</p>
                        <p class="text-justify text-xs md:text-sm  py-1">{{$review->comment}}</p>
                        
                        <p class="flex-1 text-gray-500 text-xs"><i class="fas fa-clock text-gray-500 mr-1"></i> {{$review->created_at->diffForHumans() }} </p>
                        
                        @if ($review->user_id ==  Auth::id())
                            <div class="flex absolute right-1 top-1 md:right-4 md:top-4 cursor-pointer">
                                <span wire:click="destroy({{$review}})" class="text-base md:text-lg font-bold text-red-600 items-center" title="Eliminar"><i class="fas fa-trash-alt text-base md:text-lg"></i></span>
                            </div>
                        @endif
                    </div>
                </div>
            </article>
            @empty
                
            @endforelse
        </div>
    </div>
</section>
