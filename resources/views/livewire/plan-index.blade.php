<div class="bg-black" x-data="{ open: false }">
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">
            <button x-on:click=" open = false " class="focus:outline-none bg-black border border-yellow-500 shadow-md h-12 px-4 text-yellow-500">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los planes 
            </button>
           @auth
                @php
                    $contador=0;
                @endphp
                @foreach ($planes as $plan)
                    @can('enrolled', $plan)
                        {{$contador++}}
                    @else   
                                
                    @endcan
                @endforeach
                @if ($contador>0)
                    <button x-on:click=" open = true " class="focus:outline-none bg-black border border-yellow-500 shadow-md h-12 px-4 text-yellow-500">
                        <i class="fas fa-user text-xs mr-2"></i>
                        Mis planes <span class="font-bold">{{$contador}}</span>
                    </button>
                @endif   
           @endauth
        </div>
    </div>
    <!--Cargado de todos los planes-->
    <div x-show="!open" class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10">  
            @foreach ($planes as $plan)
                <x-course-card :plan="$plan"/>
            @endforeach
    </div>
    <!--Cargado de los planes del usuario-->
    <div x-show="open" class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10"> 
           {{--  @foreach ($planes as $plan)
                   
            @endforeach --}}
            @forelse ($planes as $plan)
                @can('enrolled', $plan)
                    <x-course-card :plan="$plan"/>
                @else   
                              
                @endcan
            @empty
                No dispones de planes 
            @endforelse
    </div>
    <div class="max-w-lg mx-auto mt-4 px-4 sm:px-6 lg:px-8 py-4">
        {{$planes->links()}}
    </div>
</div>
