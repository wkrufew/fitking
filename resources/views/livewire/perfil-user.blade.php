<x-jet-action-section>
    <x-slot name="title">
        Datos corporales
    </x-slot>

    <x-slot name="description" >
        En esta seccion se van a incluir todos los datos corporales para un entrenamiento personalizado 
        y realizar el seguimiento respectivo de cada usuario.
    </x-slot>

    <x-slot name="content">
        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
               {{--  <x-jet-label for="text" value="Telefono" />
                <x-jet-input id="text" type="text" class="mt-1 block w-full" wire:model.defer="telefono" autocomplete="off"/>
                <x-jet-input-error for="telefono" class="mt-2" />
             --}}
                
                <x-jet-label for="text" value="Sexo" />
                <select class="mb-2 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model.defer="telefono">
                        <option class="text-gray-400" value="0">Seleccione su sexo</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div>
                <x-jet-label for="text" value="Edad" />
                <x-jet-input id="text" type="text" class="mb-2 block w-full" wire:model.defer="edad" autocomplete="off" />
                <x-jet-input-error for="edad" class="mt-2" />
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
                <x-jet-label for="estatura" value="Estatura (metros)" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="estatura" placeholder="1.74" autocomplete="off"/>
                <x-jet-input-error for="estatura" class="mt-2" />
            </div>
            <div>
                <x-jet-label for="peso" value="Peso  (Kg)" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="peso" placeholder="74" autocomplete="off"/>
                <x-jet-input-error for="peso" class="mt-2" />
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
                <x-jet-label for="cuello" value="Cuello" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="cuello" autocomplete="off"/>
                <x-jet-input-error for="cuello" class="mt-2" />
            </div>
            <div>
                <x-jet-label for="espalda" value="Espalda" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="espalda" autocomplete="off"/>
                <x-jet-input-error for="espalda" class="mt-2" />
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
                <x-jet-label for="brazo" value="Brazo" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="brazo"  autocomplete="off"/>
                <x-jet-input-error for="brazo" class="mt-2" />
            </div>
            <div>
                <x-jet-label for="pecho" value="Pecho" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="pecho"  autocomplete="off"/>
                <x-jet-input-error for="pecho" class="mt-2" />
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
                <x-jet-label for="pierna" value="Pierna" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="pierna"  autocomplete="off"/>
                <x-jet-input-error for="pierna" class="mt-2" />
            </div>
            <div>
                <x-jet-label for="gluteo" value="Gluteo" />
                <x-jet-input type="text" class="mb-2 block w-full" wire:model.defer="gluteo"  autocomplete="off"/>
                <x-jet-input-error for="gluteo" class="mt-2" />
            </div>
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
                @php
                    if ($peso && $estatura) {
                        $imc = $peso / pow($estatura,2) ;
                    } else {
                        $imc = '';
                    }
                @endphp
            <div>
                <div class="flex mb-2 items-center justify-between">
                    <div>
                      <span class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-white bg-green-500">
                          Indice de peso corporal (IMC)
                      </span>
                    </div>
                    <div class="text-right">
                      <span class="text-xs font-semibold inline-block text-green-600">
                          @if ($imc)
                            {{ number_format($imc,2) }}
                          @endif
                      </span>
                    </div>
                </div>
                {{--<x-jet-input type="text" class="mb-2 block w-full" disable="true" wire:model.defer="total"  autocomplete="off"/>
                <x-jet-input-error for="total" class="mt-2" /> --}}

               

                @if ($imc)
                    
                    <div class="relative pt-10">
                        
                        <div class="mx-auto justify-center relative">
                           {{--  <div class="relative translate-x-32 -translate-y-full">
                                <div class="absolute top-0 z-20 w-32 p-2 -mt-1 text-sm leading-tight text-center -translate-x-32 -translate-y-full text-white transform  bg-blue-500 rounded-lg shadow-lg">
                                    Estas aqui
                                </div>
                                <svg class="absolute z-10 w-6 h-6 text-blue-500 transform -translate-x-20 -translate-y-3 fill-current stroke-current" width="8" height="8">
                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                </svg>
                            </div> --}}
                            @if ($imc >= 18.6 && $imc <= 24.9)
                                       
                            @endif
                            @if ($imc <= 18.5)
                            <div class="relative">
                                <div class="absolute top-0 z-20 w-28 p-2 -mt-1 text-sm leading-tight text-center translate-x-0 -translate-y-full text-white transform  bg-yellow-500 rounded-lg shadow-lg">
                                    Estas aqui
                                </div>
                                <svg class="absolute z-10 w-6 h-6 text-yellow-500 transform translate-x-10 -translate-y-3 fill-current stroke-current" width="8" height="8">
                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                </svg>
                            </div> 
                            @elseif($imc >= 18.6 && $imc <= 24.9)
                            <div class="relative">
                                <div class="absolute top-0 z-20 w-32 p-2 -mt-1 text-sm leading-tight text-center translate-x-32 -translate-y-full text-white transform  bg-green-500 rounded-lg shadow-lg">
                                    Estas aqui
                                </div>
                                <svg class="absolute z-10 w-6 h-6 text-green-500 transform translate-x-44 -translate-y-3 fill-current stroke-current" width="8" height="8">
                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                </svg>
                            </div> 
                            @elseif($imc >= 25.0)
                            <div class="relative">
                                <div class="absolute top-0 z-20 w-28 md:w-32 px-1 py-2 md:py-2 md:px-2 -mt-1 text-sm leading-tight text-center translate-x-56 md:translate-x-60 -translate-y-full text-white transform  bg-red-500 rounded-lg shadow-lg">
                                    Estas aqui
                                </div>
                                <svg class="absolute z-10 w-6 h-6 text-red-500 transform translate-x-64 md:translate-x-72 -translate-y-3 fill-current stroke-current" width="8" height="8">
                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                </svg>
                            </div> 
                            @endif
                            
                            <div class="overflow-hidden h-7 md:h-5 mb-1 flex rounded-full bg-gray-100 justify-center">
                                <div style="width: 33%" class=" font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500">
                                    Bajo de peso 
                                    @if ($imc <= 18.5)
                                        {{number_format($imc,2)}}
                                    @endif
                                </div>
                                <div  style="width: 34%" class="font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                    Peso ideal 
                                    @if ($imc >= 18.6 && $imc <= 24.9)
                                        {{number_format($imc,2)}}
                                    @endif
                                </div>
                                <div style="width: 33%" class="font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                    Sobre peso
                                    @if ($imc >= 25.0)
                                        {{number_format($imc,2)}}
                                    @endif
                                </div>
                            </div>
                        </div>  
                        
                      </div>
                @else
                    <div>
                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-white bg-red-500">
                            Falta datos
                        </span>
                    </div>
                @endif
            </div>


            {{-- <div x-data="{ open: false }">
                <button @click="open = true">Show More...</button>
         
                <ul x-show="open" @click.away="open = false">
                    <li><button wire:click="archive">Archive</button></li>
                    <li><button wire:click="delete">Delete</button></li>
                </ul>
            </div> --}}

            <div>
                <x-jet-label for="observacion" value="Observacion" />
                <textarea class="mb-2 block w-full rounded-lg border border-gray-300" rows="2" wire:model.defer="Observacion"></textarea>
                <x-jet-input-error for="observacion" class="mt-2" />
            </div>
        </div>

        {{-- <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
            <div>
                <x-jet-label for="fantes" value="Foto Antes" />
                <x-jet-input wire:model="file1" type="file" accept="image/png, .jpeg, .jpg" class="mb-2 block w-full"/>
                    <div wire:loading wire:target="file1" class="text-blue-900">
                        <strong>Loading File....</strong>
                    </div>
                    @isset($fantes)
                        <img id="picture2" style="border-radius: 8px;" src="{{Storage::url($fantes)}}" width="100px" alt="">
                    @else 
                    @endisset
                
            </div>
            <div>
                <x-jet-label for="fdespues" value="Foto Despues" />
                <x-jet-input wire:model="file2" type="file" accept="image/png, .jpeg, .jpg" class="mb-2 block w-full"/>
                    <div wire:loading wire:target="file2" class="text-blue-900">
                        <strong>Loading File....</strong>
                    </div>
                   
                    @isset($fdespues)
                    <img id="picture2" style="border-radius: 8px;" src="{{Storage::url($fdespues)}}" width="100px" alt="">
                    @else    
                    @endisset
                    
            </div>
        </div> --}}

       <div class="justify-end flex mt-6 ">
            <div>
                @if (session()->has('mensaje'))
                    <div class="mr-1 my-auto text-sm">
                        {{ session('mensaje') }}.
                    </div>
                @endif
            </div>
            <x-jet-button wire:click="control" wire:loading.attr="disabled" wire:target="control">
                {{$boton}}
            </x-jet-button>
       </div>
    </x-slot>

    
</x-jet-action-section>
