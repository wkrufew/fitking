@php
    $nav_links = [
        [
            'name' => 'INICIO',
            'route' => route('home'),
            'active' => request()->routeIs('home') 
        ],
        [
            'name' => 'PLANES',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('planes.*','cursos.*')
        ],
    ]
@endphp
<div {{-- data-turbolinks-permanent  --}}class="w-full bg-transparent fixed top-0 left-0 z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-0 transition-all duration-500 ease-in" id="navbar">

<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-16 w-auto" />
                    </a>
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                @foreach ($nav_links as $nav_link)
                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    <div  class="text-gray-50 text-md hover:text-yellow-500">{{ $nav_link['name'] }}</div>
                </x-jet-nav-link>
                @endforeach
                <x-jet-nav-link href="{{route('tienda')}}" target="_blank">
                    <div  class="text-gray-50 text-md hover:text-yellow-500">TIENDA </div>
                </x-jet-nav-link>  
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @auth 
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm    rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full border-2  border-gray-50 object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        <div class="text-white py-2 px-2 flex">{{ Auth::user()->name }}</div>
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Configuraciones
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    Perfil
                                </x-jet-dropdown-link>

                                @can('Leer Planes')
                                    <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                                        Instructor
                                    </x-jet-dropdown-link>
                                @endcan

                                @can('Ver Dashboard')
                                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                        Administrador
                                    </x-jet-dropdown-link>
                                @endcan

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        Cerrar sesion
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <div class="flex">
                            <div class="p-1 border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-black">
                                <a href="{{ route('login') }}" class="text-sm font-semibold">INGRESAR</a>
                            </div>
                            <div class="p-1 border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-black border-l-0">
                                <a href="{{ route('register') }}" class="text-sm font-semibold">REGISTRARME</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-gray-200 hover:bg-gray-100 focus:outline-none focus:bg-transparent focus:text-gray-200 transition duration-500 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-gray-100 rounded-lg hidden sm:hidden mb-6 border-2 border-yellow-500">
        <div class="pt-2 pb-3 space-y-1">
            
            @foreach ($nav_links as $nav_link)

            <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                {{ $nav_link['name'] }}
            </x-jet-responsive-nav-link>

            @endforeach

            <x-jet-responsive-nav-link href="/tienda">
                <div  class="text-gray-600 text-md hover:text-yellow-500">TIENDA</div>
            </x-jet-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            PERFIL
                    </x-jet-responsive-nav-link>

                    @can('Leer Planes')
                        <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                            INSTRUCTOR
                        </x-jet-responsive-nav-link>
                    @endcan

                    @can('Ver Dashboard')
                        <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                            ADMINISTRADOR
                        </x-jet-responsive-nav-link>
                    @endcan

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            CERRAR SESIÓN
                        </x-jet-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login')}}" :active="request()->routeIs('login') ">
                    INGRESAR
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register')}}" :active="request()->routeIs('register') ">
                    REGISTRARME
                </x-jet-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>

</div>
 
    
    <script>
        $('.navbar-toggler').click(function () {
        $(this).toggleClass('active');
        $('.navigation-menu').toggleClass('hidden');
        $('#navbar').addClass('bg-black');
        });
        $(function () {
        var navigation = $("#navbar");

        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 25) {
            navigation.addClass("bg-black xl:py-0 shadow-md");
            navigation.removeClass("xl:py-4");
            } else {
            navigation.removeClass("bg-black xl:py-4 shadow-md");
            navigation.addClass("xl:py-4");
            }
        });
        });
    </script>
    