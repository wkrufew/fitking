 <form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
     <input wire:model="search" class="w-full border-2 rounded-full border-gray-300 bg-white h-12 px-5 pr-16 text-sm "
         type="search" name="search" placeholder="Busca un plan">
     {{-- <button type="submit" class="absolute -right-6 top-0 mt-2 border-2 border-red-700 bg-red-500 rounded-full font-bold text-white px-4 py-2.5 transition duration-300 ease-in-out hover:bg-red-700 hover:text-white">
         Buscar
     </button> --}}
     @if ($search)
         <ul class="absolute left-0 w-full bg-white mt-1 rounded-2xl overflow-hidden z-50">

             @forelse ($this->results as $result)
                 <div wire:loading wire:target="search" class=" p-4 w-full mx-auto">
                     <div class="animate-pulse flex space-x-4">
                         <div class="flex-1 space-y-6 py-1">
                             <div class="space-y-3">
                                 <div class="grid grid-cols-3 gap-4">
                                     <div class="h-2 bg-gray-300 rounded col-span-1"></div>
                                     <div class="h-2 bg-gray-300 rounded col-span-2"></div>
                                 </div>
                                 {{-- <div class="h-2 bg-gray-300 rounded"></div> --}}
                             </div>
                             <div class="space-y-3">
                                 <div class="grid grid-cols-3 gap-4">
                                     <div class="h-2 bg-gray-300 rounded col-span-2"></div>
                                     <div class="h-2 bg-gray-300 rounded col-span-1"></div>
                                 </div>
                                 {{-- <div class="h-2 bg-gray-300 rounded"></div> --}}
                             </div>
                         </div>
                     </div>
                 </div>
                 <li wire:loading.remove class="leading-8 px-5 text-sm cursor-pointer hover:bg-yellow-500 hover:text-white">
                     <a class="w-full block" href="{{ route('planes.show', $result) }}">{{ $result->title }}</a>
                     <span></span>
                 </li>
             @empty
                 <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-300">
                     No se encontraron coincidencias
                 </li>
             @endforelse
         </ul>
     @endif

 </form>
