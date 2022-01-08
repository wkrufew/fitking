<div>

    <h1 class="text-2xl font-bold">SECCIONES DEL PLAN</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
        <article class="card mb-6" x-data="{open: false}">
            <div class="card-body bg-white">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent = "update">
                        <input wire:model="section.name" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Escriba el nombre de la seccion...">
                        @error('section.name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
	                    @enderror
                    </form>
                @else
                <header class="flex justify-between items-center">
                    <h1 x-on:click="open = !open" class="cursor-pointer"> <strong>Sección:</strong> {{$item->name}}</h1>
                    <div>
                        <i class="fas fa-edit cursor-pointer mr-4 text-blue-600" wire:click="edit({{$item}})"></i>
                        <i class="fas fa-trash cursor-pointer text-red-600" wire:click="destroy({{$item}})"></i>
                    </div>
                </header>
                <!--ESTO LLAMA AL COMPONENTE COURSES LESSON DE LIVEWIRE-->
                <div x-show="open">
                    @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                </div>

                @endif
            </div>
        </article>
    @endforeach

    <div x-data = "{ open : false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2 "></i>
            Agregar nueva sección
        </a>
        <article x-show="open" class="card mt-3">
            <div class="card-body bg-gray-200">
                <h1 class="text-xl font-bold">Agregar nueva seccion</h1>
                <div>
                    <input wire:model="name" class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ingresa nombre de una nueva seccion">
                    @error('name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="flex justify-center mt-4">
                    <button x-on:click="open = false" class="btn btn-danger">Cancelar</button>
                    <button wire:click="store" class="btn btn-primary ml-4">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
