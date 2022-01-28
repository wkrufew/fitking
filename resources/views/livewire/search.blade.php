<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
     <input wire:model="search" class="focus:bg-white border-2 border-yellow-500 focus:ring-yellow-500 focus:outline-none focus:border-yellow-500 focus:ring-1 w-full h-10 px-5 text-sm"
         type="search" name="search" placeholder="Busca un plan ..">
     @if ($search)
         <ul class="absolute left-0 w-full bg-white mt-1 overflow-hidden z-50 divide-y divide-gray-300">
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
                <li wire:loading.remove class="leading-8 px-5 text-sm cursor-pointer hover:bg-yellow-500 hover:text-white">
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
