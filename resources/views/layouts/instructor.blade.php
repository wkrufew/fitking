<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&family=Oswald:wght@300&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        @stack('css')
        <!-- Scripts -->
        
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            <div class="py-7"></div>
            <div class="container py-8 grid grid-cols-1 lg:grid-cols-5 lg:gap-4">
                <aside class=" mb-4">
                    <h1 class="font-bold text-lg mt-2  mb-4 text-center">Edicion de un plan</h1>

                    <ul class="overflow-hidden  text-md bg-white m-2 rounded-lg shadow-lg text-gray-600 mb-10 ml-2 mr-2">
                        <li class="mt-1 leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-500 @else border-transparent  @endif pl-2 hover:bg-indigo-500 hover:text-gray-50">
                            <a href="{{route('instructor.courses.edit', $course)}}">Informacion del plan</a> 
                        </li>
                        <hr>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-500 @else border-transparent  @endif pl-2 hover:bg-indigo-500 hover:text-gray-50">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del plan</a> 
                        </li>
                        <hr>
                        <li class="leading-7 mb-1 border-l-4  pl-2 @routeIs('instructor.courses.goals', $course) border-indigo-500 @else border-transparent  @endif hover:bg-indigo-500 hover:text-gray-50">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del plan</a> 
                        </li>
                        <hr>
                        <li class="leading-7 mb-1 border-l-4  pl-2 @routeIs('instructor.courses.students', $course) border-indigo-500 @else border-transparent  @endif hover:bg-indigo-500 hover:text-gray-50">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes del plan</a> 
                        </li>
                        <hr>
                        <li class="leading-7 mb-1 border-l-4 border-transparent  pl-2 hover:bg-indigo-500 hover:text-gray-50 ">
                            <a href="{{route('instructor.courses.index')}}">Volver al listado de planes</a> 
                        </li>
                    </ul>

                    @switch($course->status)
                        @case(1)

                            <form class="mx-5" action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Solicitar Aprobacion</button>
                            </form>

                            @break
                        @case(2)
                            <div class="card">
                                <div class="card-body  bg-yellow-500 text-gray-50">
                                    <p class="font-bold text-center">Plan en revision</p>
                                </div>
                            </div>
                            @break
                        @case(3)
                        <div class="card">
                            <div class="card-body  bg-green-600 text-gray-50">
                                <p class="font-bold text-center">Plan publicado</p>
                            </div>
                        </div>
                            @break
                        @default
                            
                    @endswitch

                </aside>

                <div class="col-span-4 card">
                    <main class="card-body text-gray-600">
                        {{$slot}}
                    </main>
                </div> 
            </div>
            </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
        
    </body>
</html>
