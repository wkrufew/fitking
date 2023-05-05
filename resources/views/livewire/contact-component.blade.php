<div>
    {{--  @csrf --}}
    {{--     @if (session('exito'))
        <div x-data="{ open: true }" class="max-w-6xl mx-auto rounded-lg">
            <div x-show="open" class="bg-green-500 border border-green-600 text-green-100 my-6 px-4 py-2 rounded relative"
                role="alert">
                <strong class="font-bold">Ok!</strong>
                <span class="block sm:inline">{{ session('exito') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div x-data="{ open: true }" class="max-w-6xl mx-auto rounded-lg">
            <div x-show="open" class="bg-red-500 border border-red-600 text-red-100 my-6 px-4 py-2 rounded relative"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }} 
                </span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                    <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Cerrar</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
    @endif --}}
    <div class="px-2 md:px-10 py-4 space-y-3">
        <div class="">
            <label class="text-sm font-semibold pr-2" for="">{{ __('Nombre') }}</label>
            <input wire:model.defer="name" class="rounded-lg h-8 w-full block"
                placeholder="{{ __('Escriba su nombre') }}" type="text" name="name">
            @error('name')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div>
            <label class="text-sm font-semibold pr-2" for="">{{ __('Email') }}</label>
            <input wire:model.defer="email" class="rounded-lg h-8 w-full block"
                placeholder="Ejemplo: fitkingp@gmail.com" type="email" name="email">
            @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div>
            <label class="text-sm font-semibold pr-2" for="">{{ __('Teléfono') }}</label>
            <input wire:model.defer="phone" class="rounded-lg h-8 w-full block" placeholder="0983965263" type="tel"
                name="phone">
            @error('phone')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div>
            <label class="text-sm font-semibold pr-2" for="">{{ __('Asunto') }}</label>
            <input wire:model.defer="subject" class="rounded-lg h-8 w-full block"
                placeholder="Ejemplo: Información sobre planes de entrenamiento" type="text" name="">
            @error('subject')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div>
            <label class="text-sm font-semibold pr-2" for="">{{ __('Descripción') }}</label>
            <textarea class="rounded-lg block w-full" wire:model.defer="message" placeholder="{{ __('Mensaje') }}" name=""
                id="" cols="30" rows="2"></textarea>
            @error('message')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="pt-6 flex justify-center">
            <div wire:loading wire:target="send">
                <label class="text-neutral-900  text-base flex items-center">{{ __('Enviando Datos') }} ...
                    <svg class="animate-spin flex items-center ml-2 mr-3 h-5 w-5 text-neutral-900"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </label>
            </div>
            <button wire:click="send" wire:target="send" wire:loading.remove
                class="border-0 text-sm mx-auto focus:outline-none focus:ring ease-linear transition-all duration-150 lg:mx-0 hover:bg-neutral-700  bg-neutral-900 text-white font-bold rounded-full py-2 px-5 shadow-2xl">
                {{ __('Enviar Formulario') }}
            </button>
        </div>
    </div>
    @push('js')
        <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
        <script>
            window.addEventListener('mensaje', event => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: event.detail.icon,
                    title: event.detail.title
                })
            })
        </script>
    @endpush
</div>
