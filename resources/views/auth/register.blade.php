<x-app-layout>
    <div class="relative h-20 w-full bg-black">
    </div>
    <div class="max-w-7xl md:max-w-xl mx-auto px-4 h-screen">
        <div class="mx-auto">
            <div class="px-6 w-auto md:w-96">

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class=" flex justify-center pb-2">
                {{-- <x-jet-authentication-card-logo /> --}}
                <div class="flex-shrink-0 flex items-center mt-4 mb-2">
                    <a href="{{ route('home') }}">
                        {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                        <img class="block h-56 md:h-44" src="{{ asset('img/home/logo2.webp') }}">
                    </a>
                </div>
            </div>
            <div class="p-6 rounded-lg border border-gray-200 shadow-lg ">
                <x-jet-validation-errors class="mb-4" />


                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Nombre') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Correo') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required  autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
                                            'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Ya estoy registrado') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Registrarme') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-guest-layout>
