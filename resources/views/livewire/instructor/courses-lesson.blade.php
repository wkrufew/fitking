<div>
    @foreach ($section->lessons as $item)
    
    <article class="card mt-4" x-data="{open: false}">
        <div class="card-body">

            @if ($lesson->id == $item->id)
                <form wire:submit.prevent="update">
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="lesson.name"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('lesson.name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="lesson.platform_id">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center mt-4">
                        <label class="w-32">Link: </label>
                        <input wire:model="lesson.url" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                    </div>
                    @error('lesson.url')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <!--BOTONES PARA EDITAR Y ELIMINAR UNA LECCION-->
                    <div class="flex justify-center mt-4">
                        <button type="button" class="btn btn-danger" wire:click="cancel">Cancelar</button>
                        <button type="submit" class="btn btn-primary ml-4">Actualizar</button>
                    </div>
                </form>
            @else
                <header>
                    <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-600 mr-2"></i> Leccion: {{$item->name}}</h1>
                </header> 
                <div x-show=open>
                    <hr class="my-2">
                    <p class="text-sm ">Plataforma: {{$item->platform->name}}</p>
                    <p class="text-sm ">Link: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                    <div class="my-2">
                        <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                        <button class="btn btn-danger text-sm ml-3" wire:click="destroy({{$item}})">Eliminar</button>
                    </div>

                    <div class="mb-3">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-' . $item->id))
                    </div>

                    <div>
                        @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources' . $item->id))
                    </div>
                </div>    
            @endif

        </div>
    </article>

    @endforeach

    <div x-data = "{ open : false}">
        <a x-show="!open" x-on:click="open = true" class="mt-4 flex items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2 "></i>
            Agregar nueva lección
        </a> 
        <article x-show="open" class="card mt-3">
            <div class="card-body bg-white">
                <h1 class="text-xl font-bold">Agregar nueva lección</h1>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input wire:model="name"  class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @error('name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="platform_id">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">Link: </label>
                        <input wire:model="url" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                    </div>
                    @error('url')   
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
