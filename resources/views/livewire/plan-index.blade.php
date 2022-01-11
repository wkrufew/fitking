<div class="bg-gray-100" x-data="{ open: false }">
    <div class="bg-black py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            {{-- <button x-on:click=" open = false " class="focus:outline-none bg-white shadow-md h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilter"> --}}
            <button x-on:click=" open = false " class="focus:outline-none bg-white shadow-md h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los planes 
            </button>

           @auth
            <button x-on:click=" open = true " class="focus:outline-none bg-white shadow-md h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-user text-xs mr-2"></i>
                Mis planes
            </button>
           @endauth
          
            <!-- Dropdown Categorias -->
            {{-- <div class="relative mr-4" x-data="{ open: false }">
                <button class="bg-white shadow-md block h-12 w-full px-4 text-gray-700 rounded-lg overflow-hidden focus:outline-none" x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute z-10 right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    @foreach ($categorias as $categoria)
                    <a class="cursos-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-black hover:text-white" wire:click="$set('categoria_id', {{$categoria->id}})" x-on:click="open = false">
                        {{$categoria->name}}
                     </a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div> --}}
            <!-- // Dropdown -->

             <!-- Dropdown Niveles-->
             {{-- <div class="relative" x-data="{ open: false }">
                <button class="bg-white shadow-md block h-12 w-full px-4 text-gray-700 rounded-lg overflow-hidden focus:outline-none" x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 z-10 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false" >   
                   @foreach ($niveles as $nivel)
                   <a class="cursor-pinter transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-black hover:text-white" wire:click="$set('nivel_id', {{$nivel->id}})" x-on:click="open = false">
                    {{$nivel->name}}
                    </a>
                   @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div> --}}
            <!-- // Dropdown -->

        </div>
    </div>

    <!--Cargado de planes-->
    <div x-show="!open" class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10">
        
            @foreach ($planes as $plan)
                @can('enrolled', $plan)
                    
                @else 
                <x-course-card :plan="$plan"/>
                @endcan
            @endforeach
        
    </div>
    <div x-show="open" class="max-w-7xl mx-auto mt-12 px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mb-10"> 
        @foreach ($planes as $plan)
                @can('enrolled', $plan)
                <x-course-card :plan="$plan"/>
                @else              
                @endcan
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto mt-4 px-4 sm:px-6 lg:px-8 py-4">
        {{$planes->links()}}
    </div>
</div>
