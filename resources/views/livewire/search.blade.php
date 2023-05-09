<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        <input wire:model.debounce.500ms="search" class="focus:bg-white pl-10 pr-4 rounded-md border-2 border-yellow-500 focus:ring-yellow-500 focus:outline-none focus:border-yellow-500 focus:ring-1 w-full h-10 px-5 text-sm"
         type="search" name="search" placeholder="Ingresa el nombre de un plan ...">
    </div>
     @if ($search)
         <ul class="absolute left-0 w-full bg-white mt-1 overflow-hidden z-50 divide-y divide-gray-300 rounded-md border border-gray-500">
            @forelse ($this->results as $result)
                <div wire:loading wire:target="search" class=" px-4 w-full mx-auto">
                    <div class="animate-pulse flex space-x-4">
                        <div class="flex-1 space-y-6 py-0.5">
                            <div class="space-y-3">
                                <div class="grid grid-cols-3 gap-x-1">
                                    <div class="h-2 bg-gray-300 rounded col-span-1"></div>
                                    <div class="h-2 bg-gray-300 rounded col-span-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li wire:loading.remove class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-300 hover:text-gray-700">
                    <a class="w-full block" href="{{ route('planes.show', $result) }}">{{ $result->title }}</a>
                </li>
            @empty
                <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-300">
                    No se encontraron coincidencias
                </li>
            @endforelse
         </ul>
     @endif

</form>
