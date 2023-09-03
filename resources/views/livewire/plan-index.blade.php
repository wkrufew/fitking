{{-- <div class="bg-black" x-data="{ open: false }">
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
                @if ($contador > 0)
                    <button x-on:click=" open = true " class="focus:outline-none bg-black border border-yellow-500 shadow-md h-12 px-4 text-yellow-500">
                        <i class="fas fa-user text-xs mr-2"></i>
                        Mis planes <span class="font-bold">{{$contador}}</span>
                    </button>
                @endif   
           @endauth
        </div>
    </div>
    <!--Cargado de todos los planes-->
    <div x-show="!open" class="max-w-7xl mx-auto mt-8 px-12 md:px-4 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10">  
            @foreach ($planes as $plan)
                <x-course-card :plan="$plan"/>
            @endforeach
    </div>
    <!--Cargado de los planes del usuario-->
    <div x-show="open" class="max-w-7xl mx-auto mt-8 px-12 md:px-4 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10"> 
        
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
</div> --}}
<div class="">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-4 px-2">
        <div class="" x-data="{ openFiltro: false }">
            <section
                class="h-auto rounded-md bg-white px-4 py-2 md:py-4 shadow-lg border border-gray-300 sticky top-20 select-none">
                <div class="flex justify-between items-center">
                    <span class="text-center font-bold text-sm"><i class="fa-solid fa-filter pr-1"></i>
                        {{ __('FILTROS') }}</span>
                    <button x-on:click="openFiltro = !openFiltro" class="block sm:hidden">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': openFiltro, 'inline-flex': !openFiltro }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !openFiltro, 'inline-flex': openFiltro }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-col hidden sm:block" :class="{ 'block': openFiltro, 'hidden': !openFiltro }">
                    <div class="py-1 md:py-2">
                        <span class="text-sm font-semibold">
                            <i class="fa-solid fa-up-down pr-1"></i> {{ __('Orden') }}
                        </span>
                        <div class="pt-2 flex-col space-y-1">
                            <div class="first:w-full flex justify-between items-center">
                                <span class="text-xs">{{ __('Recientes') }}</span>
                                <input class="rounded-full checked:bg-yellow-600 checked:text-yellow-600" type="radio" wire:model="orden" value="desc">
                            </div>
                            <div class="w-full flex justify-between items-center">
                                <span class="text-xs">{{ __('Ultimos') }}</span>
                                <input class="rounded-full checked:bg-yellow-600 checked:text-yellow-600" type="radio" wire:model="orden" value="asc">
                            </div>
                        </div>
                    </div>
                    <div class="py-1">
                        <span class="text-sm font-semibold">
                            <i class="fa-solid fa-clone pr-1"></i> {{ __('Categorias') }}
                        </span>
                        <div class="pt-2 space-y-1">
                            @forelse ($categories as $category)
                                <div class="w-full flex justify-between items-center">
                                    <span class="text-xs">{{ $category->name }}</span>
                                    <input class="checked:bg-yellow-600 checked:text-yellow-600 cursor-pointer" wire:model="categorias" type="radio" name="categorias" value="{{ $category->id }}">
                                </div>
                            @empty
                                {{ __('No tiene opciones') }}
                            @endforelse
                        </div>
                    </div>
                    <div class="py-2">
                        <span class="text-sm font-semibold">
                            <i class="fa-solid fa-clone pr-1"></i> {{ __('Niveles') }}
                        </span>
                        <div class="pt-2 space-y-1">
                            @forelse ($levels as $level)
                                <div class="w-full flex justify-between items-center">
                                    <span class="text-xs">{{ $level->name }}</span>
                                    <input class="checked:bg-yellow-600 checked:text-yellow-600 cursor-pointer" wire:model="niveles" type="radio" name="niveles" value="{{ $level->id }}">
                                </div>
                            @empty
                                {{ __('No tiene opciones') }}
                            @endforelse
                        </div>
                    </div>
                    
                    <div>
                        <button wire:click="limpiar" class="bg-neutral-900 py-2 rounded-md w-full text-white text-xs mt-3 hover:bg-neutral-700 transition duration-500 ease-in-out transform hover:translate-y-0.5 hover:scale-105">
                            <i class="fa-solid fa-trash-can pr-1"></i> {{ __('Borrar Filtros') }}
                        </button>
                    </div>
                </div>
            </section>
        </div>
        <div class="md:col-span-2 lg:col-span-4">
            <div class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-4 rounded-lg">
                @forelse ($planes as $plan)
                    <x-course-card :plan="$plan" />
                @empty
                    <div class="col-span-3">
                        <span class="block sm:inline text-xs">{{ __('Lo sentimos no hemos encontrado resultados con los parametros de busqueda, vuelve a intentarlo.') }}</span>
                    </div>
                @endforelse
            </div>
            @if ($planes->hasPages())
                <div class="mt-4 rounded-lg px-6 py-3 bg-white text-center mb-4 text-base shadow-md">
                    {{ $planes->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
