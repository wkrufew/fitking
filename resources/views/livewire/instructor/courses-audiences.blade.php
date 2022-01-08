<section>
    <h1 class="text-2xl font-bold">AUDIENCIAS DEL PLAN</h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->audiences as $item)
        
        <article class="card mb-4">
            <div class="card-body bg-gray-100 ">
                @if ($audience->id == $item->id)

                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('audience.name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                        @enderror
                    </form>

                @else
                    <header class="flex justify-between">
                        <h1>{{$item->name}}</h1>
                        
                        <div>
                            <i wire:click="edit({{$item}})" class="fas fa-edit cursor-pointer text-blue-500"></i>
                            <i wire:click="destroy({{$item}})" class="fas fa-trash cursor-pointer text-red-500 ml-3"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>

    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input placeholder="Ingresa el nombre de la audiencia del plan..." wire:model="name" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                <div class="flex mt-2 justify-center">
                    <button class="flex items-center btn btn-primary btn-sm"> 
                        <i class="far fa-plus-square text-2xl text-white mr-2 "></i>
                        Agregar audiencia
                    </button>
                </div>
            </form>
        </div>
    </article>
</section>
