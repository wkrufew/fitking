<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&family=Oswald:wght@300&display=swap" rel="stylesheet"> --}}

        <!-- Styles -->

        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        @stack('css')
        <!-- Scripts -->
        
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}

        <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            {{-- <div class="py-7"></div> --}}
            <div class="py-7 md:py-0 bg-black"></div>
                <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                            <g class="wave" fill="#000000">
                                <path
                                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                                </path>
                            </g>
                            <g transform="translate(1.000000, 15.000000)" fill="#220FDC">
                                <g
                                    transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                                    <path
                                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                        opacity="0.100000001"></path>
                                    <path
                                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                        opacity="0.100000001"></path>
                                    <path
                                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                        opacity="0.200000003"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            <div class="container py-1 grid grid-cols-1 lg:grid-cols-5 lg:gap-4">
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
        {{-- @isset($js)
            {{$js}}
        @endisset --}}
        {{-- @stack('js') --}}
    </body>
</html>
