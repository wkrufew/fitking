<div>
    @if ($valor)
    <a title="Ingresar Detalle" wire:click.prevent="$set('open', true)" class=" p-1 text-blue-500 text-xl cursor-pointer">
        <i class="fas {{$this->valor}} fa-eye mx-auto"></i>
    </a>
    @else
    <a title="Sin datos" class=" p-1 text-blue-500 text-xl">
        <i class="fas fa-eye-slash mx-auto"></i>
    </a>
    @endif
    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class="text-center">
                <p class="block uppercase text-blue-900 text-sm font-bold mb-1">Perfil del estudiante </p>
                <hr>
            </div>
        </x-slot>

        <x-slot name="content">
            @if ($valor)
                <div class="text-left mt-5">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4 mb-2">
                        <div class=" uppercase  text-sm font-bold ">
                            <b class="text-blue-900">Nombre: </b> {{ $student->name }}
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Genero: </b> {{ $student->profile->telefono }}
                        </div>
                    </div>
                    <hr>
                    <div class="grid sm:grid-cols-2 md:grid-cols-3  gap-4 my-2">
                        <div class=" uppercase  text-sm font-bold ">
                            <b class="text-blue-900">Edad: </b> {{ $student->profile->edad }} años
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Estatura: </b> {{ $student->profile->estatura }} metros
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Peso: </b> {{ $student->profile->peso }} kg
                        </div>
                    </div>
                    <hr>
                    <div class="grid sm:grid-cols-2 md:grid-cols-3  gap-4 my-2">
                        <div class=" uppercase  text-sm font-bold ">
                            <b class="text-blue-900">Cuello: </b> {{ $student->profile->cuello }} cm
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Pecho: </b> {{ $student->profile->pecho }} cm
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Espalda: </b> {{ $student->profile->espalda }} cm
                        </div>
                    </div>
                    <hr>
                    <div class="grid sm:grid-cols-2 md:grid-cols-3  gap-4 my-2">
                        <div class=" uppercase  text-sm font-bold ">
                            <b class="text-blue-900">Brazo: </b> {{ $student->profile->brazo }} cm
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Gluteo: </b> {{ $student->profile->gluteo }} cm
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            <b class="text-blue-900">Pierna: </b> {{ $student->profile->pierna }} cm
                        </div>
                    </div>
                    <hr>
                    <div class="grid sm:grid-cols-2 md:grid-cols-2  gap-4 my-2">
                        <div class=" uppercase  text-sm font-bold ">
                            @isset($student->profile->fantes)
                                <img class="object-cover rounded-sm" src="{{ Storage::url($student->profile->fantes) }}"
                                    width="100px" alt="">
                            @else
                                Sin foto
                            @endisset
                        </div>
                        <div class="uppercase  text-sm font-bold">
                            @isset($student->profile->fdespues)
                                <img class="object-cover rounded-sm" src="{{ Storage::url($student->profile->fdespues) }}"
                                    width="100px" alt="">
                            @else
                                Sin foto
                            @endisset
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2  gap-4">
                        @php
                            if ($student->profile->peso && $student->profile->estatura) {
                                $imc = $student->profile->peso / pow($student->profile->estatura, 2);
                            } else {
                                $imc = '';
                            }
                        @endphp
                        <div>
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span
                                        class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-white bg-green-500">
                                        Indice de peso corporal (IMC)
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-green-600">
                                        @if ($imc)
                                            {{ number_format($imc, 2) }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            @if ($imc)
                                <div class="relative pt-10">
                                    <div class="mx-auto justify-center relative">
                                        @if ($imc >= 18.6 && $imc <= 24.9)
                                        @endif
                                        @if ($imc <= 18.5)
                                            <div class="relative">
                                                <div
                                                    class="absolute top-0 z-20 w-28 p-2 -mt-1 text-sm leading-tight text-center translate-x-0 -translate-y-full text-white transform  bg-yellow-500 rounded-lg shadow-lg">
                                                    Estas aqui
                                                </div>
                                                <svg class="absolute z-10 w-6 h-6 text-yellow-500 transform translate-x-10 -translate-y-3 fill-current stroke-current"
                                                    width="8" height="8">
                                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                                </svg>
                                            </div>
                                        @elseif($imc >= 18.6 && $imc <= 24.9)
                                            <div class="relative">
                                                <div
                                                    class="absolute top-0 z-20 w-32 p-2 -mt-1 text-sm leading-tight text-center translate-x-32 -translate-y-full text-white transform  bg-green-500 rounded-lg shadow-lg">
                                                    Estas aqui
                                                </div>
                                                <svg class="absolute z-10 w-6 h-6 text-green-500 transform translate-x-44 -translate-y-3 fill-current stroke-current"
                                                    width="8" height="8">
                                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                                </svg>
                                            </div>
                                        @elseif($imc >= 25.0)
                                            <div class="relative">
                                                <div
                                                    class="absolute top-0 z-20 w-28 md:w-32 px-1 py-2 md:py-2 md:px-2 -mt-1 text-sm leading-tight text-center translate-x-56 md:translate-x-60 -translate-y-full text-white transform  bg-red-500 rounded-lg shadow-lg">
                                                    Estas aqui
                                                </div>
                                                <svg class="absolute z-10 w-6 h-6 text-red-500 transform translate-x-64 md:translate-x-72 -translate-y-3 fill-current stroke-current"
                                                    width="8" height="8">
                                                    <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                                                </svg>
                                            </div>
                                        @endif

                                        <div
                                            class="overflow-hidden h-7 md:h-5 mb-1 flex rounded-full bg-gray-100 justify-center">
                                            <div style="width: 33%"
                                                class=" font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500">
                                                Bajo de peso
                                                @if ($imc <= 18.5)
                                                    {{ number_format($imc, 2) }}
                                                @endif
                                            </div>
                                            <div style="width: 34%"
                                                class="font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                                                Peso ideal
                                                @if ($imc >= 18.6 && $imc <= 24.9)
                                                    {{ number_format($imc, 2) }}
                                                @endif
                                            </div>
                                            <div style="width: 33%"
                                                class="font-semibold text-xs shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                Sobre peso
                                                @if ($imc >= 25.0)
                                                    {{ number_format($imc, 2) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div>
                                    <span
                                        class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-white bg-red-500">
                                        Falta datos
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <x-jet-label class="uppercase  text-sm font-bold text-center text-blue-900" for="observacion" value="Observacion" />
                            <textarea disabled class="mb-2 block w-full rounded-lg border border-gray-300" rows="3">{{$student->profile->Observacion}}</textarea>
                            <x-jet-input-error for="observacion" class="mt-2" />
                        </div>
                    </div>
                    <hr>
                </div>
            @else
                Sin datos por el momento
            @endif
            
        </x-slot>

        <x-slot name="footer">

            <div class="flex justify-evenly">
                <div class="py-1 whitespace-nowrap text-right text-sm font-medium">
                    <button class="bg-gray-500 text-white rounded-md hover:bg-gray-700 transition-all px-4 py-2" wire:click="$set('open', false)">Cerrar</button>
                </div>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>
