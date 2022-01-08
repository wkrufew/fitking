<div class="card" x-data="{open: false}">
    <div class="card-body bg-gray-100">
        <header>
            <h1 x-on:click="open = !open" class=" text-gray-600 cursor-pointer font-bold">Recursos de la leccion</h1>
        </header>

        <div x-show="open">
            <hr class="my-2">

            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i> {{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent="save">   
                    <div class="flex items-center w-full">
                        <input wire:model="file" type="file" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                    </div>

                    <div wire:loading wire:target="file" class="text-blue-600 text-sm mt-1 font-bold animate-spi">
                        Cargando...
                    </div>

                    @error('file')   
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                                <strong class="font-bold">Ups!</strong>
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                    @enderror
                </form>
            @endif

        </div>
    </div>
</div>
